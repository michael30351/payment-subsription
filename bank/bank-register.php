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
$str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
$randStr = substr(str_shuffle($str), 0, 2);
$randMemberStr = substr(str_shuffle($str), 0, 2);

$siteID = $_ENV['SITE_ID'];
$sitePass = $_ENV['SITE_PASS'];
$apiUrl = $_ENV['API_URL'];
$siteUrl = $_ENV['SITE_URL'];
$member = $now->format('YmdHis').$randMemberStr;

$bankCode = null;
$branchCode = null;
$accountNumber = null;
$accountName = null;
$name = null;
$error = null;
$plan = null;
$email = null;
$price = null;
$subscriptionPrice = null;
$date = null;
$buyItemsName = null;

$error = null;
$request_flag = false;

$equipment = $_POST['equipment'] ?? '';
$gym = $_POST['gym'] ?? '';
$plan = $_POST['plan'] ?? null;
$coupon = $_POST['campaign_code'] ?? '';
$selectedPlan = json_decode($_POST['selected_plan'] ?? '', true);
$selectedOption = json_decode($_POST['selected_option'] ?? '', true);
$equipment = $_POST['equipment'] ?? '';
$email = $_POST['email'] ?? '';
$price = $_POST['first_price'] ?? '';
$subscriptionPrice = $_POST['subscription_price'] ?? '';
$date = $_POST['selected_date'] ?? '';

// ページタイプ
$pageType = $_POST['page_type'] ?? null;
$returnURL = $siteUrl.'subscription-payments/bank/smart/'.$pageType;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bankCode = $_POST['bankCode'];
    $branchCode = $_POST['branchCode'];
    $accountNumber = $_POST['accountNumber'];
    $accountType = $_POST['accountType'];
    $accountName = $_POST['accountName'];
    $accountNameKanji = $_POST['accountNameKanji'];

} else {
    header("Location:"."https://applegym.jp");
}

// 購入商品まとめ
$selectedPlanName = $selectedPlan['name'] ?? '';
$selectedOptionName = null;
if (is_array($selectedOption)) {
    $selectedOptionName = array_column($selectedOption, 'name');
}
$selectedOptionNameStr = !empty($selectedOptionName) ? implode('+', $selectedOptionName) : '';
//`+` で結合
$buyItemsName = json_encode(implode('+', array_filter([$selectedPlanName, $selectedOptionNameStr, $equipment])));
// メール送信内容
$mailItemsName = json_encode(implode('+', array_filter([$selectedOptionNameStr, $equipment])));

if(
    $accountNameKanji == null &&
    $email == null &&
    $gym == null &&
    $plan == null &&
    $price == null &&
    $subscriptionPrice == null
) {
    $request_flag = false;
} else {
    $request_flag = true;
}

if($request_flag) {
    $param = [
        'SiteID'                  => $siteID,
        'SitePass'                => $sitePass,
        'MemberID'                => $member,
        'MemberName'              => $accountNameKanji,
        'CreateMember'            => 1,
        'RetURL'                  => $siteUrl."subscription-payments/bank/bank-register-callback.php",
        'BankCode'                => $bankCode,
        'BranchCode'              => $branchCode,
        'AccountType'             => $accountType,
        'AccountNumber'           => $accountNumber,
        'AccountName'             => $accountName,
        'AccountNameKanji'        => $accountNameKanji,
        'ConsumerDevice'          => 'pc',
    ];
    
    // Windows-31J にエンコード
    $encodedParam = [];
    foreach ($param as $key => $value) {
        $encodedParam[] = urlencode($key) . '=' . urlencode(mb_convert_encoding($value, 'SJIS-win', 'UTF-8'));
    }
    $requestBody = implode('&', $encodedParam);
    
    $_SESSION['member'] = $member;
    $_SESSION['data'][$member] = [
        "name" => $accountNameKanji,
        "kanaName" => $accountName,
        "branchCode" => $branchCode,
        "accountNumber" => $accountNumber,
        "price" => $price,
        "subscriptionPrice" => $subscriptionPrice,
        "date" => $date,
        "buyItemsName" => $buyItemsName,
        "mailItemsName" => $mailItemsName,
        "plan" => $plan,
        "email" => $email,
        "gym" => $gym,
        "coupon" => $coupon,
        "returnURL" => $returnURL,
    ];
    
    $filePath = dirname(__FILE__) ."/file/" . $member . ".json";
    file_put_contents($filePath, json_encode($_SESSION['data'][$member]));
    
    // cURLリクエストの準備
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $apiUrl.'payment/BankAccountEntry.idPass');
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

        $_SESSION['formData'] = $_SESSION['data'][$member];
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
        $error = "リクエストエラー: " . implode($data);
        
        $_SESSION['formData'] = $_SESSION['data'][$member];
    }
} else {
    $error = "エラーが発生しました。";
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
                    <?php if ($error): ?>
                    <div class="message">
                        <p><?php echo $error; ?></p>
                        <div class="btn">
                            <a href="<?php echo $returnURL; ?>" class="link-over">戻る</a>
                        </div>
                    </div>
                    <?php else: ?>
                    <form name="SelectPageCall" action="<?php echo $data['StartUrl']; ?>" method="POST">
                        <div class="message">
                            <p>金融機関に遷移します。ボタンをクリックしてください。</p>
                        </div>
                        <div class="form-btn">
                            <button type="submit" class="link-over">続行する</button>
                        </div>
                        <input type="hidden" name="TranID" value="<?php echo $data['TranID']; ?>">
                        <input type="hidden" name="Token" value="<?php echo $data['Token']; ?>">
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /.contents -->
        <footer class="footer">
            <p class="copyright">© 2018 Apple GYM</p>
        </footer>
    </div>
    <!-- /.wrapper -->
    <script>
    // <!--
    function OnLoadEvent() {
        document.SelectPageCall.submit();
    }
    // // 
    // -->
    </script>
</body>

</html>