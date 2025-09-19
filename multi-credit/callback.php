<?php
require __DIR__ . '/../vendor/autoload.php';
use Carbon\Carbon;

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// 前の送信内容の削除
// $formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : [];
// unset($_SESSION['formData']);

$now = Carbon::now('Asia/Tokyo');
$str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
$recurringStr = $now->copy()->format('YmdHis').'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';

$randStr = substr(str_shuffle($str), 0, 5);
$randMemberStr = substr(str_shuffle($str), 0, 2);
$randRecurringStr = substr(str_shuffle($recurringStr), 0, 8);

$recurringID = "o-".$randRecurringStr;

$error = null;
$accessToken = null;
$accessId = null;
$getAccessId = null;
$member = null;
$name = null;
$plan = null;
$accessToken = null;
$returnURL = null;

$order = null; // 追加
$inquiryResponseData = null; // 追加
$orderErrorResponse = false;

$shopId = $_ENV['SHOP_ID'];
$shopPass = $_ENV['SHOP_PASS'];

$siteId = $_ENV['SITE_ID'];
$sitePass = $_ENV['SITE_PASS'];
$siteUrl = $_ENV['SITE_URL'];

$oauthApiUrl = $_ENV['OAUTH_API_URL'];
$apiUrl = $_ENV['API_URL'];

$pageParams = $_GET['p'];

// $returnURL = $siteUrl.'subscription-payments/credit/smart/'.$pageType;

// GET
if ($pageParams) {
    $decodeParams = base64_decode($pageParams);
    $decodeParamsArray = json_decode($decodeParams, true);
    $accessId = $decodeParamsArray['accessId'];

} else {
    header("Location:"."https://applegym.jp");
}

if (isset($_SESSION['accessId'])) {
    $getAccessId = $_SESSION['accessId'];
    $member = $_SESSION['data'][$accessId]['member'];
    $name = $_SESSION['data'][$accessId]['name'];
    $accessToken = $_SESSION['data'][$accessId]['accessToken'];
    $price = $_SESSION['data'][$accessId]['price'];
    $subscriptionPrice = $_SESSION['data'][$accessId]['subscriptionPrice'];
    $buyItemsName = $_SESSION['data'][$accessId]['buyItemsName'];
    $date = $_SESSION['data'][$accessId]['date'];
    $gym = $_SESSION['data'][$accessId]['gym'];
    $email = $_SESSION['data'][$accessId]['email'];
    $plan = $_SESSION['data'][$accessId]['plan'];
    $mailItemsName = $_SESSION['data'][$accessId]['mailItemsName'];
    $postCode = $_SESSION['data'][$accessId]['postCode'];
    $state = $_SESSION['data'][$accessId]['state'];
    $city = $_SESSION['data'][$accessId]['city'];
    $line1 = $_SESSION['data'][$accessId]['line1'];
    $coupon = $_SESSION['data'][$accessId]['coupon'];
    $returnURL = $_SESSION['data'][$accessId]['returnURL'];
    $order = $_SESSION['data'][$accessId]['order']; // 追加
} else {
    header("Location:"."https://applegym.jp");
}

// 課金日
$selectedDate = Carbon::create($date);
// $chargeNextMonth = $selectedDate->format('Ymd'); // コメントアウトする
$chargeNextMonth = $selectedDate->copy()->addMonthNoOverflow(1)->day(1)->format('Ymd'); // 選択日の翌月1日
$startChargeDate = $selectedDate->copy()->addMonthNoOverflow(1)->day(10)->format('Y-m-d'); // 初回引き落とし日

if($accessId !== $getAccessId) {
    header("Location:"."https://applegym.jp");
}

// ************************
// Orderチェック
// ************************
$inquiryOrderParams = [
    "accessId" => $getAccessId,
    "orderId" => $order,
];

$ch = curl_init();
// オプション設定
curl_setopt($ch, CURLOPT_URL, $oauthApiUrl.'order/inquiry');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($inquiryOrderParams));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: ' . 'Bearer '. $accessToken,
    'X-MP-Version: 2024-12'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// リクエスト実行
$inquiryResponse = curl_exec($ch);
$inquiryInfo = curl_getinfo($ch);

$inquiryResponseData = json_decode($inquiryResponse, true);

// セッションを終了
curl_close($ch);

if($inquiryResponseData) { // 追加
    // エラーステータスチェック
    if ($inquiryInfo['http_code'] != 200) {
        if(isset($inquiryResponseData['detail'])) {
            $error = $inquiryResponseData['detail'];
        } else {
            $error = "エラーが発生しました。";
        }
        $orderErrorResponse = true; // 初回決済エラー
    }

    // エラーレスポンスチェック
    if($inquiryResponseData['errorInformation'] != null) {
        $errorTitle = $inquiryResponseData['errorInformation']['title'] ?? null;
        if(isset($errorTitle)) {
            if($errorTitle == 'card_declined') {
                $error = "カード起因のエラーにより、リクエストが拒否されました。";
            } else if($errorTitle == 'insufficient_balance') {
                $error = "残高が不足しているため、リクエストが拒否されました。";
            } else if($errorTitle == 'amount_limit_exceeded') {
                $error = "上限金額を超過しているため、リクエストが拒否されました。";
            } else if($errorTitle == 'processing_failure') {
                $error = "決済事業者からエラーが返りました。";
            } else if($errorTitle == 'internal_server_error') {
                $error = "サービスのサーバーで問題が発生したため、リクエストを処理できませんでした。";
            } else if($errorTitle == 'bad_gateway') {
                $error = "外部事業者やネットワークで問題が発生したため、リクエストを処理できませんでした。";
            } else if($errorTitle == 'maintenance') {
                $error = "外部事業者によるメンテナンスのため、リクエストは受け付けられません。";
            } else if($errorTitle == 'service_unavailable') {
                $error = "サービスがメンテナンス中のため、リクエストは受け付けられません。";
            } else {
                $error = "エラーが発生しました。";
            }
        }
        $orderErrorResponse = true;
    }
} else {
    $error = "エラーが発生しました。";
}

if($orderErrorResponse == false && $error == null) { // 追加

    // ************************
    // メール処理
    // ************************
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $mailTo = $email; // 自動返信メール
    $mailAdminTo = "info@applegym-test.net"; // 自動返信メール
    $bcc = "n.senzaki@rexiv.co.jp, n.takase@rexiv.co.jp, apple.t.kawamura@gmail.com"; // BCC のメールアドレス

    $message = <<< EOM
        {$name}　様

        購入ありがとうございます。
        以下の内容で初回お支払いを受け付けました。

        ===================================================
        
        【 会員ID 】 {$member}
        【 お名前 】 {$name}
        【 メールアドレス 】 {$email}
        【 郵便番号 】 {$postCode}
        【 都道府県 】 {$state}
        【 市区町村 】 {$city}
        【 町域・丁目番地 】 {$line1}
        【 店舗 】 {$gym}
        【 プラン 】 {$plan}
        【 オプション 】 {$mailItemsName}
        【 クーポン 】 {$coupon}
        【 開始日 】 {$date}
        【 初回支払い金額 】 {$totalAmountPrice}
        【 2回目以降支払い金額 】 {$subscriptionPrice}

        ===================================================

        ※このメールアドレスは送信専用です。お問い合わせを頂きましても、ご返信できませんのでご了承ください。

        Apple GYM
    EOM;

    $adminMessage = <<< EOM

        SMBC GMO PAYMENT決済フォーム【初回クレジット】からメールが届きました。

        ━━━━━━━━━━━━━━━━━━━━━━━━
        以下の内容でメールを受け付けました。
        ━━━━━━━━━━━━━━━━━━━━━━━━

        【 会員ID 】 {$member}
        【 お名前 】 {$name}
        【 メールアドレス 】 {$email}
        【 郵便番号 】 {$postCode}
        【 都道府県 】 {$state}
        【 市区町村 】 {$city}
        【 町域・丁目番地 】 {$line1}
        【 店舗 】 {$gym}
        【 プラン 】 {$plan}
        【 オプション 】 {$mailItemsName}
        【 クーポン 】 {$coupon}
        【 開始日 】 {$date}
        【 初回支払い金額 】 {$totalAmountPrice}
        【 2回目以降支払い金額 】 {$subscriptionPrice}

    EOM;

    $headers = implode("\r\n", [
        'From: info@applegym-test.net',
    ]);
    $adminHeaders = implode("\r\n", [
        'From: info@applegym-test.net',
        'Bcc: ' . $bcc
    ]);

    mb_send_mail($mailTo, "【テスト環境 Apple GYM】クレジットカード初回お支払いが完了しました", $message, $headers);
    mb_send_mail($mailAdminTo, "【テスト環境 Apple GYM】クレジットカード初回支払いのお知らせ", $adminMessage, $adminHeaders);


    // カード登録
    $merchant = [
        "name" => "Apple GYM",
        "nameKana" => "アップルジム",
        "nameAlphabet" => "Apple GYM",
        "nameShort" => "アップルジム",
        "contactName" => "サポート窓口",
        "contactEmail" => "customer@apple-gym.com",
        "contactUrl" => "https://applegym.jp/customer-contact/",
        "contactPhone" => "03-6451-2024",
        "contactOpeningHours" => "9:00-15:00",
    ];
    $storeCardParams = [
        "merchant" => $merchant,
        "creditStoringInformation" => [
            "referrer" => [
                "accessId" => $accessId,
            ],
            "onfileCardOptions" => [
                "memberId" => $member,
                "memberName" => $name,
                "createNewMember" => true,
                "setDefault" => true,
                "duplicationCheckOptions" => [
                    "enableDuplicationCheck" => false,
                ]
            ],
        ],
    ];
    
    $ch = curl_init();
    // オプション設定
    curl_setopt($ch, CURLOPT_URL, $oauthApiUrl.'credit/storeCard');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($storeCardParams));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: ' . 'Bearer '. $accessToken,
        'X-MP-Version: 2024-12'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // リクエスト実行
    $storeResponse = curl_exec($ch);
    $storeInfo = curl_getinfo($ch); // 追加
    
    // エラーチェック 追加
    if ($storeInfo['http_code'] != 201) {
        $storeResponseData = json_decode($storeResponse, true);
        if($storeResponseData) {
            if(isset($storeResponseData['detail'])) {
                if($storeResponseData['detail'] == 'The card number is already in use by another member.') {
                    $error = "既に登録済みのカードです。詳しくは店舗のLINEへ直接ご連絡をお願いいたします。";
                } else {
                    $error = $storeResponseData['detail'];
                }
            } else {
                $error = "エラーが発生しました。";
            }
        }
    }
    
    // セッションを終了
    curl_close($ch);

    if($error == null) {
        // 定期払い設定
        $registerParams = [
            'ShopID'           => $shopId,
            'ShopPass'         => $shopPass,
            'RecurringID'      => $recurringID,
            // 'PlanID'           => $plan,
            'Amount'           => $subscriptionPrice,
            'ChargeDay'        => 10, // 10日に課金
            'ChargeMonth'      => "01|02|03|04|05|06|07|08|09|10|11|12", // 課金月
            'ChargeStartDate'  => $chargeNextMonth, // 課金開始日
            'RegistType'       => 1,
            'SiteID'           => $siteId,
            'SitePass'         => $sitePass,
            'MemberID'         => $member,
            'ClientField1'     => $buyItemsName,
        ];
        
        // Windows-31J にエンコード
        $encodedParam = [];
        foreach ($registerParams as $key => $value) {
            $encodedParam[] = urlencode($key) . '=' . urlencode(mb_convert_encoding($value, 'SJIS-win', 'UTF-8'));
        }
        $requestBody = implode('&', $encodedParam);
        
        // cURLリクエストの準備
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $apiUrl.'payment/RegisterRecurringCredit.idPass');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
        
        // ヘッダーの設定
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded;charset=windows-31j',
        ]);
        
        // リクエスト送信
        $registerResponse = curl_exec($curl);
        $curlinfo = curl_getinfo($curl);
        curl_close($curl);
        
        // レスポンスチェック
        if ($curlinfo['http_code'] != 200) {
            $error = "エラーが発生しました。";
        }
        
        // レスポンスのエラーチェック
        $dataMap = explode('&', $registerResponse);
        $data = [];
        foreach ($dataMap as $value) {
            $splitArray = explode('=', $value, 2);
            if (2 == count($splitArray)) {
                $data[$splitArray[0]] = $splitArray[1];
            }
        }
        if (array_key_exists('ErrCode', $data) || $error != null) {
            $error = "リクエストエラー: " . implode($data);
        } else { // 成功時
            // ************************
            // メール処理
            // ************************
        
            session_destroy(); // 追加
        
            mb_language("Japanese");
            mb_internal_encoding("UTF-8");
        
            $mailTo = $email; // 自動返信メール
            $mailAdminTo = "info@applegym-test.net"; // 自動返信メール
            $bcc = "n.senzaki@rexiv.co.jp, n.takase@rexiv.co.jp, apple.t.kawamura@gmail.com"; // BCC のメールアドレス
        
            $message = <<< EOM
                {$name}　様
        
                ご登録ありがとうございます。
                以下の内容で登録受け付けました。
        
                ===================================================
                
                【 会員ID 】{$member}
                【 お名前 】{$name}
                【 メールアドレス 】{$email}
                【 郵便番号 】{$postCode}
                【 都道府県 】{$state}
                【 市区町村 】{$city}
                【 町域・丁目番地 】{$line1}
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
        
                SMBC GMO PAYMENT決済フォーム【クレジット】からメールが届きました。
        
                ━━━━━━━━━━━━━━━━━━━━━━━━
                以下の内容でメールを受け付けました。
                ━━━━━━━━━━━━━━━━━━━━━━━━
        
                【 会員ID 】{$member}
                【 自動売上ID 】{$recurringID}
                【 ゲスト種別 】新規
                【 支払い方法 】クレジット
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
        
            mb_send_mail($mailTo, "【テスト環境 Apple GYM】クレジットカード登録が完了しました", $message, $headers);
            mb_send_mail($mailAdminTo, "【テスト環境 Apple GYM】クレジットカード決済のお知らせ", $adminMessage, $adminHeaders);    
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>クレジットカードフォーム｜ AppleGYM（アップルジム）</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="canonical" href="" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="og:site_name" content="初めてのパーソナルジムApple GYM（アップルジム）" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="クレジットカードフォーム｜ AppleGYM（アップルジム）" />
    <meta property="og:url" content="" />
    <meta property="article:published_time" content="2024-03-07T07:04:57+00:00" />
    <meta property="article:modified_time" content="2024-03-07T07:04:57+00:00" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="クレジットカードフォーム" />

    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../../../js/jquery-3.3.1.min.js"></script>
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
                    <h1>クレジットカードフォーム</h1>
                </div>
            </div>
            <!-- ./fv -->
            <div class="form-area card-form">
                <div class="inner">
                    <div class="message">
                        <?php if ($error): ?>
                        <p><?php echo $error; ?></p>
                        <!-- <p>定期支払い登録が失敗しました。恐れ入りますがお問合せくださいませ。</p> -->
                        <div class="btn">
                            <a href="<?php echo $returnURL; ?>" class="link-over">戻る</a>
                        </div>
                        <?php else: ?>
                        <p>クレジットカード決済及びご登録が完了しました。</p>
                        <div class="btn">
                            <a href="https://applegym.jp/" class="link-over">戻る</a>
                        </div>
                        <script>
                            sessionStorage.removeItem('terms_checkbox_enabled');
                        </script>
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