<?php
require __DIR__ . '/../vendor/autoload.php';
use Carbon\Carbon;

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

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
$item = null;
$accessToken = null;
$order = null;
$inquiryResponseData = null;
$orderErrorResponse = false;

$shopId = $_ENV['SHOP_ID'];
$shopPass = $_ENV['SHOP_PASS'];

$siteId = $_ENV['SITE_ID'];
$sitePass = $_ENV['SITE_PASS'];
$siteUrl = $_ENV['SITE_URL'];

$oauthApiUrl = $_ENV['OAUTH_API_URL'];
$apiUrl = $_ENV['API_URL'];

$pageParams = $_GET['p'];

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
    $buyItemsName = $_SESSION['data'][$accessId]['buyItemsName'];
    $gym = $_SESSION['data'][$accessId]['gym'];
    $email = $_SESSION['data'][$accessId]['email'];
    $item = $_SESSION['data'][$accessId]['item'];
    $mailItemsName = $_SESSION['data'][$accessId]['mailItemsName'];
    $postCode = $_SESSION['data'][$accessId]['postCode'];
    $state = $_SESSION['data'][$accessId]['state'];
    $city = $_SESSION['data'][$accessId]['city'];
    $line1 = $_SESSION['data'][$accessId]['line1'];
    $order = $_SESSION['data'][$accessId]['order'];
} else {
    header("Location:"."https://applegym.jp");
}

if($accessId !== $getAccessId) {
    header("Location:"."https://applegym.jp");
}

// 購入の状態チェック
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

if($inquiryResponseData) {
    // エラーステータスチェック
    if ($inquiryInfo['http_code'] != 200) {
        if(isset($inquiryResponseData['detail'])) {
            $error = $inquiryResponseData['detail'];
        } else {
            $error = "エラーが発生しました。";
        }
        $orderErrorResponse = true; // 決済エラー
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
            $orderErrorResponse = true; // 決済エラー
        }
    }
} else {
    $error = "エラーが発生しました。";
}

if($error == null) { // 決済エラーがない場合
    
    // 決済完了メール
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
        以下の内容でお支払いを受け付けました。

        ===================================================
        
        【 購入ID 】 {$order}
        【 お名前 】 {$name}
        【 メールアドレス 】 {$email}
        【 郵便番号 】 {$postCode}
        【 都道府県 】 {$state}
        【 市区町村 】 {$city}
        【 町域・丁目番地 】 {$line1}
        【 店舗 】 {$gym}
        【 商品 】 {$item}
        【 支払い金額 】 {$price}

        ===================================================

        ※このメールアドレスは送信専用です。お問い合わせを頂きましても、ご返信できませんのでご了承ください。

        Apple GYM
    EOM;

    $adminMessage = <<< EOM

        SMBC GMO PAYMENT決済フォーム【単発決済クレジット】からメールが届きました。

        ━━━━━━━━━━━━━━━━━━━━━━━━
        以下の内容でメールを受け付けました。
        ━━━━━━━━━━━━━━━━━━━━━━━━

        【 購入ID 】 {$order}
        【 お名前 】 {$name}
        【 メールアドレス 】 {$email}
        【 郵便番号 】 {$postCode}
        【 都道府県 】 {$state}
        【 市区町村 】 {$city}
        【 町域・丁目番地 】 {$line1}
        【 店舗 】 {$gym}
        【 商品 】 {$item}
        【 支払い金額 】 {$price}

    EOM;

    $headers = implode("\r\n", [
        'From: info@applegym-test.net',
    ]);
    $adminHeaders = implode("\r\n", [
        'From: info@applegym-test.net',
        'Bcc: ' . $bcc
    ]);

    mb_send_mail($mailTo, "【テスト環境 Apple GYM】クレジットカード単発決済が完了しました", $message, $headers);
    mb_send_mail($mailAdminTo, "【テスト環境 Apple GYM】クレジットカード単発決済のお知らせ", $adminMessage, $adminHeaders);

    session_destroy();
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
                        <div class="btn">
                            <a href="./onetime/" class="link-over">戻る</a>
                        </div>
                        <?php else: ?>
                        <p>クレジットカード決済が完了しました。</p>
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