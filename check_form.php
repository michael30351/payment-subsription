<?php
$plans = [
    "S20" => [
        "name" => "S20",
        "times" => 4,
        "price" => 9000,
    ],
    "M20" => [
        "name" => "M20",
        "times" => 8,
        "price" => 18000,
    ],
    "L20" => [
        "name" => "L20",
        "times" => 12,
        "price" => 27000,
    ],
    "S40" => [
        "name" => "S40",
        "times" => 4,
        "price" => 18000,
    ],
    "M40" => [
        "name" => "M40",
        "times" => 8,
        "price" => 36000,
    ],
    "L40" => [
        "name" => "L40",
        "times" => 12,
        "price" => 54000,
    ],
];

$with_plans = [
    "S20" => [
        "name" => "S20",
        "times" => 4,
        "price" => 4500,
    ],
    "M20" => [
        "name" => "M20",
        "times" => 8,
        "price" => 9000,
    ],
    "L20" => [
        "name" => "L20",
        "times" => 12,
        "price" => 13500,
    ],
];

$options = [
    // "プロテイン" => [
    //     "name" => "プロテイン",
    //     "type" => 1, // 1: 回数, 2: 月, 3: 食事サポート（初月）
    //     "price" => 450,
    // ],
    "シューズお預かり" => [
        "name" => "シューズお預かり",
        "type" => 2, // 1: 回数, 2: 月, 3: 食事サポート（初月）
        "price" => 900,
    ],
    "食事サポート2週間" => [
        "name" => "食事サポート2週間",
        "type" => 3, // 1: 回数, 2: 月, 3: 食事サポート（初月）
        "price" => 10000,
    ],
    "食事サポート4週間" => [
        "name" => "食事サポート4週間",
        "type" => 3, // 1: 回数, 2: 月, 3: 食事サポート（初月）
        "price" => 18000,
    ],
];

$options2 = [
    "プロテイン" => [
        "name" => "プロテイン",
        "type" => 1, // 1: 回数, 2: 月, 3: 食事サポート（初月）
        "price" => 450,
    ],
    "シューズお預かり" => [
        "name" => "シューズお預かり",
        "type" => 2, // 1: 回数, 2: 月, 3: 食事サポート（初月）
        "price" => 900,
    ],
    "水" => [
        "name" => "水",
        "type" => 1, // 1: 回数, 2: 月, 3: 食事サポート（初月）
        "price" => 100,
    ],
    "食事サポート2週間" => [
        "name" => "食事サポート2週間",
        "type" => 3, // 1: 回数, 2: 月, 3: 食事サポート（初月）
        "price" => 10000,
    ],
    "食事サポート4週間" => [
        "name" => "食事サポート4週間",
        "type" => 3, // 1: 回数, 2: 月, 3: 食事サポート（初月）
        "price" => 18000,
    ],
];

$campaigns = [
    "nyukai2025" => [ // 入会金半額クーポン
        [
            "description" => "入会金半額",
            "type" => 2, // 1: プラン割引率, 2: 入会金割引金額
            "discount" => 5000,
        ]
    ],
    "nyukai2025-2" => [ // 入会金無料クーポン
        [
            "description" => "入会金無料",
            "type" => 2, // 1: プラン割引率, 2: 入会金割引金額
            "discount" => 10000,
        ]
    ],
    "day1214" => [ // 昼割（10%）
        [
            "description" => "昼割適応（10%OFF）",
            "type" => 1, // 1: プラン割引率, 2: 入会金割引金額
            "discount" => 0.1,
        ],
        [
            "description" => "入会金無料",
            "type" => 2, // 1: プラン割引率, 2: 入会金割引金額
            "discount" => 10000,
        ],
    ],
    "day1214-2" => [ // 昼割（10%）
        [
            "description" => "昼割適応（10%OFF）",
            "type" => 1, // 1: プラン割引率, 2: 入会金割引金額
            "discount" => 0.1,
        ],
        [
            "description" => "入会金半額",
            "type" => 2, // 1: プラン割引率, 2: 入会金割引金額
            "discount" => 5000,
        ],
    ],
    "coupon202520" => [ // 入会金半額+初月20%OFF
        [
            "description" => "入会金半額",
            "type" => 2, // 1: プラン割引率, 2: 入会金割引金額
            "discount" => 5000,
        ],
        [
            "description" => "初月割引適応（20%OFF）",
            "type" => 3, // 1: プラン割引率, 2: 入会金割引金額, 3: 1ヶ月目の月額利用料の割引率
            "discount" => 0.2,
        ],
    ],
    "coupon202520-2" => [ // 入会金無料+初月20%OFF
        [
            "description" => "入会金無料",
            "type" => 2, // 1: プラン割引率, 2: 入会金割引金額
            "discount" => 10000,
        ],
        [
            "description" => "初月割引適応（20%OFF）",
            "type" => 3, // 1: プラン割引率, 2: 入会金割引金額, 3: 1ヶ月目の月額利用料の割引率
            "discount" => 0.2,
        ],
    ],
    "coupon202520-3" => [ // 入会金全額+初月20%OFF
        [
            "description" => "初月割引適応（20%OFF）",
            "type" => 3, // 1: プラン割引率, 2: 入会金割引金額, 3: 1ヶ月目の月額利用料の割引率
            "discount" => 0.2,
        ],
    ],
];

// 単発商品
$items = [
    "直前予約変更料（20分）" => [
        "name" => "直前予約変更料（20分）",
        "price" => 1000,
    ],
    "直前予約変更料（40分）" => [
        "name" => "直前予約変更料（40分）",
        "price" => 2000,
    ],
    "追加チケット（20分）" => [
        "name" => "追加チケット（20分）",
        "price" => 2250,
    ],
    "追加チケット（40分）" => [
        "name" => "追加チケット（40分）",
        "price" => 4500,
    ],
];

// 店舗別の料金設定（追加）
$gym_plans = [
    "三鷹店" => [
        "S20" => [
            "name" => "S20",
            "times" => 4,
            "price" => 10400,
        ],
        "M20" => [
            "name" => "M20",
            "times" => 8,
            "price" => 20800,
        ],
        "L20" => [
            "name" => "L20",
            "times" => 12,
            "price" => 31200,
        ],
        "S40" => [
            "name" => "S40",
            "times" => 4,
            "price" => 20800,
        ],
        "M40" => [
            "name" => "M40",
            "times" => 8,
            "price" => 41600,
        ],
        "L40" => [
            "name" => "L40",
            "times" => 12,
            "price" => 62400,
        ],
    ],
    "恵比寿店" => [
        "S20" => [
            "name" => "S20",
            "times" => 4,
            "price" => 10400,
        ],
        "M20" => [
            "name" => "M20",
            "times" => 8,
            "price" => 20800,
        ],
        "L20" => [
            "name" => "L20",
            "times" => 12,
            "price" => 31200,
        ],
        "S40" => [
            "name" => "S40",
            "times" => 4,
            "price" => 20800,
        ],
        "M40" => [
            "name" => "M40",
            "times" => 8,
            "price" => 41600,
        ],
        "L40" => [
            "name" => "L40",
            "times" => 12,
            "price" => 62400,
        ],
    ],
    "駒沢大学店" => [
        "S20" => [
            "name" => "S20",
            "times" => 4,
            "price" => 10400,
        ],
        "M20" => [
            "name" => "M20",
            "times" => 8,
            "price" => 20800,
        ],
        "L20" => [
            "name" => "L20",
            "times" => 12,
            "price" => 31200,
        ],
        "S40" => [
            "name" => "S40",
            "times" => 4,
            "price" => 20800,
        ],
        "M40" => [
            "name" => "M40",
            "times" => 8,
            "price" => 41600,
        ],
        "L40" => [
            "name" => "L40",
            "times" => 12,
            "price" => 62400,
        ],
    ],
    "五反田店" => [
        "S20" => [
            "name" => "S20",
            "times" => 4,
            "price" => 10400,
        ],
        "M20" => [
            "name" => "M20",
            "times" => 8,
            "price" => 20800,
        ],
        "L20" => [
            "name" => "L20",
            "times" => 12,
            "price" => 31200,
        ],
        "S40" => [
            "name" => "S40",
            "times" => 4,
            "price" => 20800,
        ],
        "M40" => [
            "name" => "M40",
            "times" => 8,
            "price" => 41600,
        ],
        "L40" => [
            "name" => "L40",
            "times" => 12,
            "price" => 62400,
        ],
    ],
    "下北沢店" => [
        "S20" => [
            "name" => "S20",
            "times" => 4,
            "price" => 10400,
        ],
        "M20" => [
            "name" => "M20",
            "times" => 8,
            "price" => 20800,
        ],
        "L20" => [
            "name" => "L20",
            "times" => 12,
            "price" => 31200,
        ],
        "S40" => [
            "name" => "S40",
            "times" => 4,
            "price" => 20800,
        ],
        "M40" => [
            "name" => "M40",
            "times" => 8,
            "price" => 41600,
        ],
        "L40" => [
            "name" => "L40",
            "times" => 12,
            "price" => 62400,
        ],
    ],
    "千歳船橋店" => [
        "S20" => [
            "name" => "S20",
            "times" => 4,
            "price" => 10400,
        ],
        "M20" => [
            "name" => "M20",
            "times" => 8,
            "price" => 20800,
        ],
        "L20" => [
            "name" => "L20",
            "times" => 12,
            "price" => 31200,
        ],
        "S40" => [
            "name" => "S40",
            "times" => 4,
            "price" => 20800,
        ],
        "M40" => [
            "name" => "M40",
            "times" => 8,
            "price" => 41600,
        ],
        "L40" => [
            "name" => "L40",
            "times" => 12,
            "price" => 62400,
        ],
    ],
    "上大岡店" => [
        "S20" => [
            "name" => "S20",
            "times" => 4,
            "price" => 10400,
        ],
        "M20" => [
            "name" => "M20",
            "times" => 8,
            "price" => 20800,
        ],
        "L20" => [
            "name" => "L20",
            "times" => 12,
            "price" => 31200,
        ],
        "S40" => [
            "name" => "S40",
            "times" => 4,
            "price" => 20800,
        ],
        "M40" => [
            "name" => "M40",
            "times" => 8,
            "price" => 41600,
        ],
        "L40" => [
            "name" => "L40",
            "times" => 12,
            "price" => 62400,
        ],
    ],
    "葛西店" => [
        "S20" => [
            "name" => "S20",
            "times" => 4,
            "price" => 10400,
        ],
        "M20" => [
            "name" => "M20",
            "times" => 8,
            "price" => 20800,
        ],
        "L20" => [
            "name" => "L20",
            "times" => 12,
            "price" => 31200,
        ],
        "S40" => [
            "name" => "S40",
            "times" => 4,
            "price" => 20800,
        ],
        "M40" => [
            "name" => "M40",
            "times" => 8,
            "price" => 41600,
        ],
        "L40" => [
            "name" => "L40",
            "times" => 12,
            "price" => 62400,
        ],
    ],
    "鶴見店" => [
        "S20" => [
            "name" => "S20",
            "times" => 4,
            "price" => 10400,
        ],
        "M20" => [
            "name" => "M20",
            "times" => 8,
            "price" => 20800,
        ],
        "L20" => [
            "name" => "L20",
            "times" => 12,
            "price" => 31200,
        ],
        "S40" => [
            "name" => "S40",
            "times" => 4,
            "price" => 20800,
        ],
        "M40" => [
            "name" => "M40",
            "times" => 8,
            "price" => 41600,
        ],
        "L40" => [
            "name" => "L40",
            "times" => 12,
            "price" => 62400,
        ],
    ],
];

// 店舗選択（追加）
if (isset($_POST["gym_data"])) {
    $plan = $_POST["plan_data"];
    $gym = $_POST["gym_data"];

    // 店舗が存在する場合、その店舗の金額を返す
    if (isset($gym_plans[$gym])) {
        $gym_plan = $gym_plans[$gym];
        echo json_encode($gym_plan);
        exit;
    } else {
        echo json_encode($plans);
        exit;
    }

    echo json_encode($plans);
    exit;
}

// プラン金額
if (isset($_POST["plan_data"])) {
    $plan = $_POST["plan_data"];
    $gym = $_POST["selected_gym"];

    if($gym) {
        if (array_key_exists($gym, $gym_plans)) {
            $gym_plan = $gym_plans[$gym];

            echo json_encode($gym_plan[$plan]);
            exit;

        } else {
            if (array_key_exists($plan, $plans)) {
                echo json_encode($plans[$plan]);
                exit;
            }
        }
    } else {
        if (array_key_exists($plan, $plans)) {
            echo json_encode($plans[$plan]);
            exit;
        }
    }

    echo json_encode([]);
    exit;
}

if (isset($_POST["with_plan_data"])) {
    $plan = $_POST["with_plan_data"];

    if (array_key_exists($plan, $with_plans)) {
        echo json_encode($with_plans[$plan]);
        exit;
    }

    echo json_encode([]);
    exit;
}

if (isset($_POST["option_data"])) {
    $option = $_POST["option_data"];

    if (array_key_exists($option, $options)) {
        echo json_encode($options[$option]);
        exit;
    }

    echo json_encode([]);
    exit;
}

// 水オプション
if (isset($_POST["option_data2"])) {
    $option = $_POST["option_data2"];

    if (array_key_exists($option, $options2)) {
        echo json_encode($options2[$option]);
        exit;
    }

    echo json_encode([]);
    exit;
}

if (isset($_POST["campaign_code"])) {
    $code = $_POST["campaign_code"];

    if (array_key_exists($code, $campaigns)) {
        echo json_encode($campaigns[$code]);
        exit;
    }

    echo json_encode([]);
    exit;
}

if (isset($_POST["item_data"])) {
    $item = $_POST["item_data"];

    if (array_key_exists($item, $items)) {
        echo json_encode($items[$item]);
        exit;
    }

    echo json_encode([]);
    exit;
}










// ===== ペア入会とオプション数量処理を追加 ===== //

// ペア入会の検証処理
if (isset($_POST["pair_validation"])) {
    header('Content-Type: application/json');
    echo json_encode([
        'valid' => true,
        'discount_rate' => 0.2,
        'message' => 'ペア入会割引適用'
    ]);
    exit;
}

// オプション数量付きの処理
if (isset($_POST["option_with_quantity"])) {
    $optionName = $_POST["option_name"] ?? '';
    $quantity = intval($_POST["quantity"] ?? 1);
    
    // 最大数量制限
    $maxQuantities = [
        'シューズお預かり' => 5,
        '食事サポート2週間' => 2,
        '食事サポート4週間' => 2
    ];
    
    // 数量制限チェック
    if (isset($maxQuantities[$optionName])) {
        $quantity = min($quantity, $maxQuantities[$optionName]);
        $quantity = max($quantity, 1); // 最小1
    }
    
    // オプション情報を取得
    $optionInfo = null;
    if (array_key_exists($optionName, $options)) {
        $optionInfo = $options[$optionName];
        $optionInfo['quantity'] = $quantity;
        $optionInfo['total'] = $optionInfo['price'] * $quantity;
    }
    
    header('Content-Type: application/json');
    
    if ($optionInfo) {
        echo json_encode($optionInfo);
    } else {
        echo json_encode(['error' => 'Invalid option']);
    }
    exit;
}

// ===== ペア入会と新規/既存ゲスト対応の料金計算システム ===== //

// 開始日による月数計算
if (isset($_POST["calculate_months"])) {
    $startDate = $_POST["start_date"] ?? '';
    
    if (!empty($startDate)) {
        $day = (int)date('d', strtotime($startDate));
        $months = ($day <= 15) ? 2 : 1.5;
        
        header('Content-Type: application/json');
        echo json_encode([
            'months' => $months,
            'start_day' => $day
        ]);
        exit;
    }
    
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid start date']);
    exit;
}

// ペア入会時の金額計算（新要件対応）
if (isset($_POST["calculate_pair_price"])) {
    $planName = $_POST["plan"] ?? '';
    $gymName = $_POST["gym"] ?? '';
    $startDate = $_POST["start_date"] ?? '';
    $isNewGuest = $_POST["is_new_guest"] ?? true;
    $selectedOptions = $_POST["selected_options"] ?? [];
    
    // 開始日による月数計算
    $months = 1;
    if (!empty($startDate)) {
        $day = (int)date('d', strtotime($startDate));
        $months = ($day <= 15) ? 2 : 1.5;
    }
    
    // プラン価格を取得
    $planPrice = 0;
    if (isset($gym_plans[$gymName]) && isset($gym_plans[$gymName][$planName])) {
        $planPrice = $gym_plans[$gymName][$planName]['price'];
    } elseif (isset($plans[$planName])) {
        $planPrice = $plans[$planName]['price'];
    }
    
    // ペア入会時のプラン料金計算（2人分の20%OFF）
    $pairPlanPrice = round(($planPrice * 2) * 0.8);
    
    // 初回支払い金額計算
    $initialPayment = [];
    $monthlyPayment = [];
    
    // 入会金（新規ゲストのみ、ペアの場合は2人で10,000円）
    if ($isNewGuest) {
        $initialPayment['entrance_fee'] = 10000;
    }
    
    // プラン金額
    if ($isNewGuest) {
        $initialPayment['plan_fee'] = $pairPlanPrice * $months;
    } else {
        $initialPayment['plan_fee'] = $pairPlanPrice;
    }
    $monthlyPayment['plan_fee'] = $pairPlanPrice;
    
    // 共用設備費
    $facilityFee = 660;
    if ($isNewGuest) {
        $initialPayment['facility_fee'] = $facilityFee * $months;
    } else {
        $initialPayment['facility_fee'] = $facilityFee;
    }
    $monthlyPayment['facility_fee'] = $facilityFee;
    
    // オプション料金計算
    $initialPayment['options'] = [];
    $monthlyPayment['options'] = [];
    
    foreach ($selectedOptions as $option) {
        $optionName = $option['name'] ?? '';
        $optionPrice = 0;
        
        if (array_key_exists($optionName, $options)) {
            $optionPrice = $options[$optionName]['price'];
        }
        
        // ペア料金（2倍）
        $pairOptionPrice = $optionPrice * 2;
        
        if ($optionName === 'シューズお預かり') {
            // シューズお預かりは月額制
            if ($isNewGuest) {
                $initialPayment['options'][$optionName] = $pairOptionPrice * $months;
            } else {
                $initialPayment['options'][$optionName] = $pairOptionPrice;
            }
            $monthlyPayment['options'][$optionName] = $pairOptionPrice;
            
        } elseif (in_array($optionName, ['食事サポート2週間', '食事サポート4週間'])) {
            // 食事サポートは初回のみ
            $initialPayment['options'][$optionName] = $pairOptionPrice;
        }
    }
    
    // 合計金額計算
    $initialTotal = array_sum($initialPayment);
    foreach ($initialPayment['options'] as $optionFee) {
        $initialTotal += $optionFee;
    }
    
    $monthlyTotal = array_sum($monthlyPayment);
    foreach ($monthlyPayment['options'] as $optionFee) {
        $monthlyTotal += $optionFee;
    }
    
    header('Content-Type: application/json');
    echo json_encode([
        'months' => $months,
        'single_plan_price' => $planPrice,
        'pair_plan_price' => $pairPlanPrice,
        'discount_amount' => ($planPrice * 2) - $pairPlanPrice,
        'initial_payment' => $initialPayment,
        'monthly_payment' => $monthlyPayment,
        'initial_total' => $initialTotal,
        'monthly_total' => $monthlyTotal,
        'is_new_guest' => $isNewGuest
    ]);
    exit;
}

// 通常の料金計算（ペア入会でない場合）
if (isset($_POST["calculate_regular_price"])) {
    $planName = $_POST["plan"] ?? '';
    $gymName = $_POST["gym"] ?? '';
    $startDate = $_POST["start_date"] ?? '';
    $isNewGuest = $_POST["is_new_guest"] ?? true;
    $selectedOptions = $_POST["selected_options"] ?? [];
    
    // 開始日による月数計算
    $months = 1;
    if (!empty($startDate)) {
        $day = (int)date('d', strtotime($startDate));
        $months = ($day <= 15) ? 2 : 1.5;
    }
    
    // プラン価格を取得
    $planPrice = 0;
    if (isset($gym_plans[$gymName]) && isset($gym_plans[$gymName][$planName])) {
        $planPrice = $gym_plans[$gymName][$planName]['price'];
    } elseif (isset($plans[$planName])) {
        $planPrice = $plans[$planName]['price'];
    }
    
    // 初回支払い金額計算
    $initialPayment = [];
    $monthlyPayment = [];
    
    // 入会金（新規ゲストのみ）
    if ($isNewGuest) {
        $initialPayment['entrance_fee'] = 10000;
    }
    
    // プラン金額
    if ($isNewGuest) {
        $initialPayment['plan_fee'] = $planPrice * $months;
    } else {
        $initialPayment['plan_fee'] = $planPrice;
    }
    $monthlyPayment['plan_fee'] = $planPrice;
    
    // 共用設備費（通常は330円、ペアの場合のみ660円）
    $facilityFee = 330;
    if ($isNewGuest) {
        $initialPayment['facility_fee'] = $facilityFee * $months;
    } else {
        $initialPayment['facility_fee'] = $facilityFee;
    }
    $monthlyPayment['facility_fee'] = $facilityFee;
    
    // オプション料金計算
    $initialPayment['options'] = [];
    $monthlyPayment['options'] = [];
    
    foreach ($selectedOptions as $option) {
        $optionName = $option['name'] ?? '';
        $optionPrice = 0;
        
        if (array_key_exists($optionName, $options)) {
            $optionPrice = $options[$optionName]['price'];
        }
        
        if ($optionName === 'シューズお預かり') {
            // シューズお預かりは月額制
            if ($isNewGuest) {
                $initialPayment['options'][$optionName] = $optionPrice * $months;
            } else {
                $initialPayment['options'][$optionName] = $optionPrice;
            }
            $monthlyPayment['options'][$optionName] = $optionPrice;
            
        } elseif (in_array($optionName, ['食事サポート2週間', '食事サポート4週間'])) {
            // 食事サポートは初回のみ
            $initialPayment['options'][$optionName] = $optionPrice;
        }
    }
    
    // 合計金額計算
    $initialTotal = array_sum($initialPayment);
    foreach ($initialPayment['options'] as $optionFee) {
        $initialTotal += $optionFee;
    }
    
    $monthlyTotal = array_sum($monthlyPayment);
    foreach ($monthlyPayment['options'] as $optionFee) {
        $monthlyTotal += $optionFee;
    }
    
    header('Content-Type: application/json');
    echo json_encode([
        'months' => $months,
        'plan_price' => $planPrice,
        'initial_payment' => $initialPayment,
        'monthly_payment' => $monthlyPayment,
        'initial_total' => $initialTotal,
        'monthly_total' => $monthlyTotal,
        'is_new_guest' => $isNewGuest
    ]);
    exit;
}

// 食事サポートの相互排他チェック
if (isset($_POST["validate_meal_support"])) {
    $selectedMealSupport = $_POST["selected_meal_support"] ?? [];
    
    $hasTwoWeek = in_array('食事サポート2週間', $selectedMealSupport);
    $hasFourWeek = in_array('食事サポート4週間', $selectedMealSupport);
    
    $isValid = !($hasTwoWeek && $hasFourWeek);
    
    header('Content-Type: application/json');
    echo json_encode([
        'valid' => $isValid,
        'message' => $isValid ? 'OK' : '食事サポートは2週間または4週間のどちらか一つのみ選択してください'
    ]);
    exit;
}

// ===== 追加ここまで ===== //
?>

















?>