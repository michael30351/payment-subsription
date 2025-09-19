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
$recurringStr = $now->copy()->format('YmdHis').'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';

$randStr = substr(str_shuffle($str), 0, 5);
$randMemberStr = substr(str_shuffle($str), 0, 9);
$randRecurringStr = substr(str_shuffle($recurringStr), 0, 8);

$order = 'order'.$now->format('YmdHis').$randStr;
$member = $now->format('YmdHis').$randMemberStr;
$chargeNextMonth = $now->copy()->addMonthNoOverflow(1)->day(23)->format('Ymd');
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
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$price = $_POST['first_price'] ?? null;
$subscriptionPrice = $_POST['subscription_price'] ?? null;
$token = $_POST['token'] ?? null;
$line1 = $_POST['line1'] ?? null;
$city = $_POST['city'] ?? null;
$state = $_POST['state'] ?? null;
$postCode = $_POST['postCode'] ?? null;
$date = $_POST['selected_date'] ?? '';
$selectedPlan = json_decode($_POST['selected_plan'] ?? '', true);
$selectedOption = json_decode($_POST['selected_option'] ?? '', true);
$equipment = $_POST['equipment'] ?? '';
$gym = $_POST['gym'] ?? '';
$plan = $_POST['plan'] ?? '';
$coupon = $_POST['campaign_code'] ?? '';
$totalAmountPrice = $_POST['total_amount_price'] ?? null;

$holderName = $_POST['holderName'] ?? null;
$securityCode = $_POST['securityCode'] ?? null;

$today = $now->copy()->format('Y-m-d');
$twoMonthsLater = $now->copy()->addMonth(2)->format('Y-m-d');

$pageType = $_POST['page_type'] ?? null;
$returnURL = $siteUrl.'subscription-payments/credit/smart/'.$pageType;

$errorFlag = false;
$errors = [];

// ========== ペア入会・オプション機能 ==========
$pairEntry = $_POST['pair_entry'] ?? null;
$optionQuantities = json_decode($_POST['option_quantities'] ?? '{}', true);

// ペア入会の場合、2人目の会員IDを生成
$pairMember = null;
if($pairEntry == '1') {
    $pairMember = $now->format('YmdHis').substr(str_shuffle($str), 0, 9);
}

// POST チェック
if (
    $_SERVER['REQUEST_METHOD'] !== 'POST' ||
    ( $name == null ||
    $email == null ||
    $price == null ||
    $totalAmountPrice == null ||
    $subscriptionPrice == null ||
    $token == null ||
    $line1 == null ||
    $city == null ||
    $state == null ||
    $pageType == null ||
    $postCode == null ||
    $date == null ||
    empty($holderName) ||
    empty($securityCode) ||
    $selectedPlan == null
    )
) {
    $error = "エラーが発生しました。";
} else {
    $request_flag = true;
}

if($date <= $today || $date > $twoMonthsLater) {
    $request_flag = false;
    $error = "エラーが発生しました。";
}

// 購入商品まとめ
$selectedPlanName = $selectedPlan['name'] ?? '';

// オプション名に数量を追加
$selectedOptionNameWithQty = [];
if (is_array($selectedOption)) {
    foreach($selectedOption as $option) {
        $optionName = $option['name'];
        if(!empty($optionQuantities[$optionName]) && $optionQuantities[$optionName] > 1) {
            $selectedOptionNameWithQty[] = $optionName . '×' . $optionQuantities[$optionName];
        } else {
            $selectedOptionNameWithQty[] = $optionName;
        }
    }
}
$selectedOptionNameStr = !empty($selectedOptionNameWithQty) ? implode('+', $selectedOptionNameWithQty) : '';

// ペア入会の場合、商品名に【ペア入会】を付ける
if($pairEntry == '1') {
    $selectedPlanName = "【ペア入会20%OFF】" . $selectedPlanName;
}

$buyItemsName = implode('+', array_filter([$selectedPlanName, $selectedOptionNameStr, $equipment]));
$mailItemsName = implode('+', array_filter([$selectedOptionNameStr, $equipment]));

if($request_flag) {
    // アクセストークン取得
    $accessTokenUrl = $_ENV['ACCESS_TOKEN_URL']."token";
    $tokenParams = [
        'grant_type' => 'client_credentials',
        'scope' => 'openapi',
    ];

    $authHeader = 'Basic ' . base64_encode($shopId . ':' . $shopPass);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $accessTokenUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($tokenParams));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
        'Authorization: ' . $authHeader,
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $tokenResponse = curl_exec($ch);
    $tokenHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch)) {
        $error = 'エラー: ' . curl_error($ch);
        $errorFlag = true;
    } else {
        $tokenResponseData = json_decode($tokenResponse, true);
        if($tokenResponseData) {
            $accessToken = $tokenResponseData['access_token'];
        } else {
        }
    }
    curl_close($ch);

    // 決済実行（通常のcredit/chargeを使用）
    if(!$errorFlag && $accessToken) {
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
            "callbackUrl" => "https://applegym-test.net/subscription-payments/credit/callback.php",
        ];
        
        // 通常のcredit/chargeエンドポイントを使用（ペア入会でも同じ）
        $creditChargeParams = [
            "merchant" => $merchant,
            "order" => [
                "orderId" => $order,
                "amount" => $totalAmountPrice,
                "clientFields" => [
                    "clientField1" => $pairEntry == '1' ? "ペア初回決済" : "初回決済",
                    "clientField2" => $member,
                ] + ($pairEntry == '1' ? ["clientField3" => "PAIR:{$pairMember}"] : []),
                "items" => [
                    [
                        "name" => $buyItemsName,
                        "description" => $buyItemsName,
                        "quantity" => 1,  // 数量は常に1
                        "type" => "SERVICE",
                        "price" => $totalAmountPrice,
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
            "creditInformation" => [
                "tokenizedCard" => [
                    "type" => "MP_TOKEN",
                    "token" => $token,
                ],
                "creditChargeOptions" => [
                    "authorizationMode" => "CAPTURE"
                ],
            ],
            "tds2Information" => [
                "tds2Options" => [
                    "autoAuthorization" => true
                ]
            ],
            "fraudDetectionInformation" => [
                "fraudDetectionOptions" => [
                    "screeningType" => "RED_SHIELD"
                ],
                "fraudDetectionData" => [
                    "userId" => $member
                ]
            ]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $oauthApiUrl.'credit/charge');  // 通常のエンドポイント
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($creditChargeParams));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ' . 'Bearer '. $accessToken,
            'X-MP-Version: 2024-12'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $chargeResponse = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error = 'エラー: ' . curl_error($ch);
            $errorFlag = true;
        } else {
            $chargeResponseData = json_decode($chargeResponse, true);

            if($chargeResponseData) {
                
                if(isset($chargeResponseData['orderReference'])) {
                    $accessId = $chargeResponseData['orderReference']['accessId'];
                    $rediretUrl = $chargeResponseData['redirectInformation']['redirectUrl'];
                } else {
                    $errorFlag = true;
                    $error = "エラーが発生しました。";
                }
            } else {
                $errorFlag = true;
                $error = "レスポンスの解析に失敗しました。";
            }
        }

        curl_close($ch);

        $_SESSION['formData'] = $_POST;

        if(!$errorFlag) {
            // セッションデータ保存
            $_SESSION['accessId'] = $accessId;
            $_SESSION['data'][$accessId] = [
                'accessToken' => $accessToken,
                'member' => $member,
                'pairMember' => $pairMember,
                'pairEntry' => $pairEntry,
                'name' => $name,
                'plan' => $plan,
                'price' => $totalAmountPrice,
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
                'order' => $order,
                'optionQuantities' => $optionQuantities,
            ];
        
            if($rediretUrl) {
                header("Location:".$rediretUrl);
                exit;
            }
        }
    }
} else {
    $_SESSION['formData'] = $_POST;
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
            <div class="form-area card-form">
                <div class="inner">
                    <div class="message">
                        <?php if ($error): ?>
                        <p><?php echo $error; ?></p>
                        <div class="btn">
                            <a href="<?php echo $returnURL; ?>" class="link-over">戻る</a>
                        </div>
                        <?php else: ?>
                        <p>クレジットカードの決済が完了しました</p>
                        <div class="btn">
                            <a href="https://applegym.jp/" class="link-over">戻る</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p class="copyright">© 2018 Apple GYM</p>
        </footer>
    </div>
</body>
</html>