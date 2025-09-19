<?php
require __DIR__ . '/../vendor/autoload.php';
use Carbon\Carbon;

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// 前の送信内容の削除
$formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : [];
unset($_SESSION['formData']);

$now = Carbon::now('Asia/Tokyo');
$str = $now->copy()->format('YmdHis').'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
$randStr = substr(str_shuffle($str), 0, 8);

$shopID = $_ENV['SHOP_ID'];
$shopPass = $_ENV['SHOP_PASS'];
$apiUrl = $_ENV['API_URL'];
$siteUrl = $_ENV['SITE_URL'];
$sitePass = $_ENV['SITE_PASS'];
$recurringID = "o-".$randStr;

$error = null;
$plan = null;
$member = null;
$request_flag = false;
$returnURL = null;
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $member = $_POST['MemberID'];
    $siteID = $_POST['SiteID'];
    $name = $_POST['AccountName'];
    $result = $_POST['Result'];
} else {
    header("Location:"."https://applegym.jp");
}

$filePath = dirname(__FILE__) ."/file/" . $member . ".json";
if (file_exists($filePath)) {
    $memberData = json_decode(file_get_contents($filePath), true);

    $name = $memberData['name']; // 漢字
    $price = $memberData['price'];
    $subscriptionPrice = $memberData['subscriptionPrice'];
    $date = $memberData['date'];
    $buyItemsName = $memberData['buyItemsName'];
    $mailItemsName = $memberData['mailItemsName'];
    $plan = $memberData['plan'];
    $email = $memberData['email'];
    $gym = $memberData['gym'];
    $coupon = $memberData['coupon'];
    
    $buyItemsName = json_decode($buyItemsName);
    $mailItemsName = json_decode($mailItemsName);

    // フォーム内容を保持
    $_SESSION['formData'] = $memberData;
    // ページタイプ
    $pageType = $memberData['pageType'] ?? null;
    $returnURL = $memberData['returnURL'];

    unlink($filePath);
} else {
    $error = "エラーが発生しました。";
}

if($result != null && $result == "SUCCESS") {
    $request_flag = true;
} else {
    $error = "エラーが発生しました。";
}

if($request_flag) {
    // 課金日
    $selectedDate = Carbon::create($now);
    $chargeNextMonth = $selectedDate->copy()->addDays(1)->format('Ymd'); // 消す
    $startChargeDate = $chargeNextMonth;
    // $selectedDate = Carbon::create($date);
    // $chargeNextMonth = $selectedDate->copy()->addMonthNoOverflow(2)->day(1)->format('Ymd');
    // $startChargeDate = $selectedDate->copy()->addMonthNoOverflow(2)->day(23)->format('Y-m-d'); // 初回引き落とし日
    
    $param = [
        'ShopID'           => $shopID,
        'ShopPass'         => $shopPass,
        'RecurringID'      => $recurringID,
        'Amount'           => $subscriptionPrice,
        'ChargeMonth'      => "01|02|03|04|05|06|07|08|09|10|11|12",
        'ChargeStartDate'  => $chargeNextMonth,
        'ChargeDay'        => 23,
        'SiteID'           => $siteID,
        'SitePass'         => $sitePass,
        'MemberID'         => $member,
        "ClientField1"     => $buyItemsName,
    ];
    
    // Windows-31J にエンコード
    $encodedParam = [];
    foreach ($param as $key => $value) {
        $encodedParam[] = urlencode($key) . '=' . urlencode(mb_convert_encoding($value, 'SJIS-win', 'UTF-8'));
    }
    $requestBody = implode('&', $encodedParam);
    
    // cURLリクエストの準備
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $apiUrl.'payment/RegisterRecurringSelect.idPass');
    curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
    
    // ヘッダーの設定
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded;charset=windows-31j',
    ]);
    
    // リクエスト送信
    $response = curl_exec($curl);
    $curlinfo = curl_getinfo($curl);
    curl_close($curl);
    
    // レスポンスチェック
    if ($curlinfo['http_code'] != 200) {
        $error = "エラーが発生しました。";
    }
    
    // レスポンスのエラーチェック
    $dataMap = explode('&', $response);
    $data = [];
    foreach ($dataMap as $value) {
        $splitArray = explode('=', $value, 2);
        if (2 == count($splitArray)) {
            $data[$splitArray[0]] = $splitArray[1];
        }
    }
    if (array_key_exists('ErrCode', $data)) {
        $error .= "リクエストエラー: " . implode($data);
    } else { // 成功時
        // ************************
        // メール処理
        // ************************
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        session_destroy(); // 追加
        
        $mailTo = $email; // 自動返信メール
        $mailAdminTo = "info@applegym-test.net"; // 自動返信メール
        $bcc = "n.senzaki@rexiv.co.jp, n.takase@rexiv.co.jp, applegym.afi@gmail.com, apple.t.kawamura@gmail.com"; // BCC のメールアドレス
        
        $message = <<< EOM
            {$name}　様
        
            ご登録ありがとうございます。
            以下の内容で登録を受け付けました。
        
            ===================================================
            
            【 会員ID 】{$member}
            【 お名前 】{$name}
            【 メールアドレス 】{$email}
            【 店舗 】{$gym}
            【 プラン 】{$plan}
            【 オプション 】{$mailItemsName}
            【 クーポン 】{$coupon}
            【 開始日 】{$date}
            【 初回引き落とし日 】{$startChargeDate}
            【 初回支払い金額 】{$price}
            【 2回目以降支払い金額 】{$subscriptionPrice}
        
            ===================================================
        
            ※このメールアドレスは送信専用です。お問い合わせを頂きましても、ご返信できませんのでご了承ください。
        
            Apple GYM
        EOM;
        
        $adminMessage = <<< EOM
        
            SMBC GMO PAYMENT登録フォーム【口座振替】からメールが届きました。
        
            ━━━━━━━━━━━━━━━━━━━━━━━━
            以下の内容でメールを受け付けました。
            ━━━━━━━━━━━━━━━━━━━━━━━━
        
            【 会員ID 】{$member}
            【 自動売上ID 】{$recurringID}
            【 ゲスト種別 】新規
            【 支払い方法 】口座振替
            【 お名前 】{$name}
            【 メールアドレス 】{$email}
            【 店舗 】{$gym}
            【 プラン 】{$plan}
            【 オプション 】{$mailItemsName}
            【 クーポン 】{$coupon}
            【 開始日 】{$date}
            【 初回引き落とし日 】{$startChargeDate}
            【 初回支払い金額 】{$price}
            【 2回目以降支払い金額 】{$subscriptionPrice}
        
        EOM;
        
        $headers = implode("\r\n", [
            'From: info@applegym-test.net',
        ]);
        $adminHeaders = implode("\r\n", [
            'From: info@applegym-test.net',
            'Bcc: ' . $bcc
        ]);
        
        mb_send_mail($mailTo, "【テスト環境 Apple GYM】口座登録が完了しました。", $message, $headers);
        mb_send_mail($mailAdminTo, "【テスト環境 Apple GYM】口座振替のお知らせ", $adminMessage, $adminHeaders);
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=Windows-31J">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>口座振替フォーム｜ AppleGYM（アップルジム）</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="canonical" href="" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="og:site_name" content="初めてのパーソナルジムApple GYM（アップルジム）" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="口座振替フォーム｜ AppleGYM（アップルジム）" />
    <meta property="og:url" content="" />
    <meta property="article:published_time" content="2024-03-07T07:04:57+00:00" />
    <meta property="article:modified_time" content="2024-03-07T07:04:57+00:00" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="口座振替フォーム" />

    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta name="robots" content="noindex" />
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="inner">
                <div class="box">
                    <div class="logo">
                        <a href="#" class="link-over">
                            <img src="../img/header-logo-img.svg" alt="Apple GYM（アップルジム）のロゴ" width="110" height="150" />
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="contents contact-page">
            <div class="fv">
                <div class="inner">
                    <h1>口座振替フォーム</h1>
                </div>
            </div>
            <!-- ./fv -->
            <div class="form-area card-form">
                <div class="inner">
                    <div class="message">
                        <?php if ($error): ?>
                        <p><?php echo $error; ?></p>
                        <div class="btn">
                            <a href="<?php echo $returnURL; ?>" class="link-over">戻る</a>
                        </div>
                        <?php else: ?>
                        <p>口座振替の登録が完了しました</p>
                        <div class="btn">
                            <a href="https://applegym.jp/" class="link-over">戻る</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.contents -->
        <footer class="footer">
            <p class="copyright">© 2018 Apple GYM</p>
        </footer>
    </div>
    <!-- /.wrapper -->
</body>

</html>