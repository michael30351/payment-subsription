<?php
require __DIR__ . '/../vendor/autoload.php';
use Carbon\Carbon;

session_start();

// 前の送信内容の削除
unset($_SESSION['accessId']);
unset($_SESSION['data']);

// 前の送信内容の削除
// $formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : [];
// unset($_SESSION['formData']);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$now = Carbon::now('Asia/Tokyo');
$str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
$recurringStr = $now->copy()->format('YmdHis').'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';

$randStr = substr(str_shuffle($str), 0, 5);
$randMemberStr = substr(str_shuffle($str), 0, 2);
$randRecurringStr = substr(str_shuffle($recurringStr), 0, 8);

$order = 'order'.$now->format('YmdHis').$randStr; // 追加
$member = $now->format('YmdHis').$randMemberStr;
$recurringID = "o-".$randRecurringStr;

$error = null;
$request_flag = false;
$accessToken = null;
$accessId = null;

$shopId = $_ENV['SHOP_ID'];
$shopPass = $_ENV['SHOP_PASS'];

$siteId = $_ENV['SITE_ID'];
$sitePass = $_ENV['SITE_PASS'];
$siteUrl = $_ENV['SITE_URL'];

$oauthApiUrl = $_ENV['OAUTH_API_URL'];
$apiUrl = $_ENV['API_URL'];

// リクエスト
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$price = $_POST['first_price'] ?? '';
$subscriptionPrice = $_POST['subscription_price'] ?? '';
$token = $_POST['token'] ?? '';
$line1 = $_POST['line1'] ?? '';
$city = $_POST['city'] ?? '';
$state = $_POST['state'] ?? '';
$postCode = $_POST['postCode'] ?? '';
$date = $_POST['selected_date'] ?? '';
$selectedPlan = json_decode($_POST['selected_plan'] ?? '', true);
$selectedOption = json_decode($_POST['selected_option'] ?? '', true);
$equipment = $_POST['equipment'] ?? '';
$gym = $_POST['gym'] ?? '';
$plan = $_POST['plan'] ?? '';
$coupon = $_POST['campaign_code'] ?? '';

$holderName = $_POST['holderName'] ?? null;
$securityCode = $_POST['securityCode'] ?? null;

// ページタイプ
$pageType = $_POST['page_type'] ?? null;
$returnURL = $siteUrl.'subscription-payments/multi-credit/smart/'.$pageType;

// フォーム内容を保持
$_SESSION['formData'] = $_POST;

// POST チェック
if (
    $_SERVER['REQUEST_METHOD'] !== 'POST' ||
    ( $name == null ||
    $email == null ||
    $price == null ||
    $subscriptionPrice == null ||
    $token == null ||
    $line1 == null ||
    $city == null ||
    $state == null ||
    $pageType == null ||
    $postCode == null ||
    empty($holderName) ||
    empty($securityCode) ||
    $selectedPlan == null // 追加
    )
) {
    // フォーム内容を保持
    $_SESSION['formData'] = $_POST;
    $error = "エラーが発生しました。";
} else {
    $request_flag = true;
}

// 購入商品まとめ
$selectedPlanName = $selectedPlan['name'] ?? '';
$selectedOptionName = null;
if (is_array($selectedOption)) {
    $selectedOptionName = array_column($selectedOption, 'name');
}
$selectedOptionNameStr = !empty($selectedOptionName) ? implode('+', $selectedOptionName) : '';
//`+` で結合
$buyItemsName = implode('+', array_filter([$selectedPlanName, $selectedOptionNameStr, $equipment]));
// メール送信内容
$mailItemsName = implode('+', array_filter([$selectedOptionNameStr, $equipment]));

if($request_flag) { // フラグチェック

    // ************************
    // 信用確認
    // ************************
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
        "callbackUrl" => "https://applegym-test.net/subscription-payments/multi-credit/card-register-callback.php",
    ];
    $storeCardParams = [
        "merchant" => $merchant,
        "order" => [
            "orderId" => $order,
            "clientFields" => [
                "clientField1" => "会員登録",
                "clientField2" => $member,
            ],
            "items" => [
                [
                    "name" => "会員登録",
                    "quantity" => 1,
                    "type" => "SERVICE",
                    "price" => 0,
                ]
            ],
            "transactionType" => "CIT",
            "shippingAddress" => [
                "name" => $name,
                "line1" => $line1,
                "city" => $city,
                "state" => $state,
                "postCode" => $postCode,
                "country" => "392",
            ],
            "addressMatch" => true
        ],
        "payer" => [
            "name" => $name,
            "email" => $email,
        ],
        "creditVerificationInformation" => [
            "tokenizedCard" => [
                "type" => "MP_TOKEN",
                "token" => $token,
            ],
            "onfileCardOptions" => [
                "memberId" => $member,
                "memberName" => $name,
                "createNewMember" => true,
                "setDefault" => true, // 追加
                "duplicationCheckOptions" => [ // 追加
                    "enableDuplicationCheck" => false
                ],
            ],
        ],
    ];

    // アクセストークン
    $accessTokenUrl = $_ENV['ACCESS_TOKEN_URL']."token";
    $tokenParams = [
        'grant_type' => 'client_credentials',
        'scope' => 'openapi',
    ];

    $authHeader = 'Basic ' . base64_encode($shopId . ':' . $shopPass);

    // cURLセッションを初期化
    $ch = curl_init();

    // オプション設定
    curl_setopt($ch, CURLOPT_URL, $accessTokenUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($tokenParams));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: ' . $authHeader,
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // リクエスト実行
    $tokenResponse = curl_exec($ch);

    // エラーチェック
    if (curl_errno($ch)) {
        $error = 'エラー: ' . curl_error($ch);
    } else {
        // レスポンスをデコードして表示
        $tokenResponseData = json_decode($tokenResponse, true);
        if($tokenResponseData) {
            $accessToken = $tokenResponseData['access_token'];
        }
    }

    // セッションを終了
    curl_close($ch);

    // cURLセッションを初期化
    $ch = curl_init();

    // オプション設定
    curl_setopt($ch, CURLOPT_URL, $oauthApiUrl.'credit/verifyCard');
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

    // エラーチェック
    if (curl_errno($ch)) {
        $error = 'エラー: ' . curl_error($ch);
    } else {
        // レスポンスをデコードして表示
        $storeResponseData = json_decode($storeResponse, true);
        if($storeResponseData) {
            if(isset($storeResponseData['orderReference'])) {
                $accessId = $storeResponseData['orderReference']['accessId'];
                $rediretUrl = $storeResponseData['redirectInformation']['redirectUrl'];
            } else {
                if(isset($storeResponseData['detail'])) {
                    if($storeResponseData['detail'] == 'The card number is already in use by another member.') {
                        $error = "既に登録済みのカードです。詳しくは店舗のLINEへ直接ご連絡をお願いいたします。";
                    } else {
                        // $error = $storeResponseData['detail'];
                        $error = "エラーが発生しました。";
                        // var_dump($storeResponseData['detail']);
                        // return;
                    }
                } else {
                    $error = "エラーが発生しました。";
                }
            }
        }
    }

    // セッションを終了
    curl_close($ch);

    $_SESSION['accessId'] = $accessId;
    $_SESSION['data'][$accessId] = [
        'accessToken' => $accessToken,
        'member' => $member,
        'name' => $name,
        'plan' => $plan,
        'price' => $price,
        'subscriptionPrice' => $subscriptionPrice,
        'buyItemsName' => $buyItemsName,
        'date' => $date,
        'email' => $email,
        'gym' => $gym,
        'mailItemsName' => $mailItemsName,
        'postCode' => $postCode,
        'state' => $state,
        'city' => $city,
        'line1' => $line1,
        'coupon' => $coupon,
        'returnURL' => $returnURL,
        'order' => $order, // 追加
    ];

    // フォーム内容を保持
    $_SESSION['formData'] = $_POST;

    // リダイレクト
    if($rediretUrl) {
        header("Location:".$rediretUrl);
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
                            <a href="<?php echo $returnURL; ?>" class="link-over">戻る</a>
                        </div>
                        <?php else: ?>
                        <p>クレジットカードの登録が完了しました</p>
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