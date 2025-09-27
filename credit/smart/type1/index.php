<?php
require '../../../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable('../../../');
$dotenv->load();

$shopId = $_ENV['SHOP_ID'];

$formData = $_SESSION['formData'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>【SMART】クレジットカードフォーム｜ AppleGYM（アップルジム）</title>
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

    <link rel="stylesheet" type="text/css" href="../../../css/style.css" />
    <meta name="robots" content="noindex" />
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="inner">
                <div class="box">
                    <div class="logo">
                        <a href="#" class="link-over">
                            <img src="../../../img/header-logo-img.svg" alt="Apple GYM（アップルジム）のロゴ" width="110"
                                height="150" />
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
                    <div class="tab-wrap smart-tab">
                        <button class="tab-btn active link-over" data-target="tab1">
                            ご入会手続き
                        </button>
                        <button class="tab-btn link-over" data-target="tab2">
                            会員の方
                        </button>
                    </div>
                    <form method="post" name="formName" id="form">

                        <div class="pair-check-box">
                            <label for="pair" class="link-over">
                                <input
                                    type="checkbox"
                                    name="pair"
                                    id="pair"
                                >
                                ペアでのご入会の場合はチェックしてください。
                            </label>
                        </div>

                        <div class="input-area">
                            <div class="headline">
                                お名前
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="name" id="name"
                                    value="<?php echo isset($formData['name']) ? htmlspecialchars($formData['name']) : ''; ?>"
                                    placeholder="山田林檎" required />
                                <p id="errorName" class="error-message">お名前が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                メールアドレス
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="email" name="email" id="email"
                                    value="<?php echo isset($formData['email']) ? htmlspecialchars($formData['email']) : ''; ?>"
                                    placeholder="×××@×××.com" required />
                                <p id="errorMail" class="error-message">メールアドレスが無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                都道府県
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <select name="state" id="state" required>
                                    <option value="">選択してください</option>
                                    <option value="001">北海道</option>
                                    <option value="002">青森県</option>
                                    <option value="003">岩手県</option>
                                    <option value="004">宮城県</option>
                                    <option value="005">秋田県</option>
                                    <option value="006">山形県</option>
                                    <option value="007">福島県</option>
                                    <option value="008">茨城県</option>
                                    <option value="009">栃木県</option>
                                    <option value="010">群馬県</option>
                                    <option value="011">埼玉県</option>
                                    <option value="012">千葉県</option>
                                    <option value="013">東京都</option>
                                    <option value="014">神奈川県</option>
                                    <option value="015">新潟県</option>
                                    <option value="016">富山県</option>
                                    <option value="017">石川県</option>
                                    <option value="018">福井県</option>
                                    <option value="019">山梨県</option>
                                    <option value="020">長野県</option>
                                    <option value="021">岐阜県</option>
                                    <option value="022">静岡県</option>
                                    <option value="023">愛知県</option>
                                    <option value="024">三重県</option>
                                    <option value="025">滋賀県</option>
                                    <option value="026">京都府</option>
                                    <option value="027">大阪府</option>
                                    <option value="028">兵庫県</option>
                                    <option value="029">奈良県</option>
                                    <option value="030">和歌山県</option>
                                    <option value="031">鳥取県</option>
                                    <option value="032">島根県</option>
                                    <option value="033">岡山県</option>
                                    <option value="034">広島県</option>
                                    <option value="035">山口県</option>
                                    <option value="036">徳島県</option>
                                    <option value="037">香川県</option>
                                    <option value="038">愛媛県</option>
                                    <option value="039">高知県</option>
                                    <option value="040">福岡県</option>
                                    <option value="041">佐賀県</option>
                                    <option value="042">長崎県</option>
                                    <option value="043">熊本県</option>
                                    <option value="044">大分県</option>
                                    <option value="045">宮崎県</option>
                                    <option value="046">鹿児島県</option>
                                    <option value="047">沖縄県</option>
                                </select>
                                <p id="errorState" class="error-message">都道府県を選択してください。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                郵便番号
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="postCode" id="postCode"
                                    value="<?php echo isset($formData['postCode']) ? htmlspecialchars($formData['postCode']) : ''; ?>"
                                    placeholder="123-4567" required />
                                <p id="errorPostCode" class="error-message">郵便番号が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                市区町村
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="city" id="city"
                                    value="<?php echo isset($formData['city']) ? htmlspecialchars($formData['city']) : ''; ?>"
                                    placeholder="市区町村" required />
                                <p id="errorCity" class="error-message">市区町村が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                町域・丁目番地
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="line1" id="line1"
                                    value="<?php echo isset($formData['line1']) ? htmlspecialchars($formData['line1']) : ''; ?>"
                                    placeholder="町域・丁目番地" required />
                                <p id="errorLine1" class="error-message">町域・町名番地が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                店舗
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <select name="gym" id="gym" required>
                                    <option value="">選択してください</option>
                                    <option value="昭島店">昭島店</option>
                                    <option value="秋葉原店">秋葉原店</option>
                                    <option value="阿佐ヶ谷店">阿佐ヶ谷店</option>
                                    <option value="飯田橋店">飯田橋店</option>
                                    <option value="池袋店">池袋店</option>
                                    <option value="板橋店">板橋店</option>
                                    <option value="上野店">上野店</option>
                                    <option value="恵比寿店">恵比寿店</option>
                                    <option value="王子店">王子店</option>
                                    <option value="大泉学園店">大泉学園店</option>
                                    <option value="大塚店">大塚店</option>
                                    <option value="荻窪店">荻窪店</option>
                                    <option value="押上店">押上店</option>
                                    <option value="神楽坂店">神楽坂店</option>
                                    <option value="葛西店">葛西店</option>
                                    <option value="蒲田店">蒲田店</option>
                                    <option value="亀有店">亀有店</option>
                                    <option value="北千住店">北千住店</option>
                                    <option value="吉祥寺店">吉祥寺店</option>
                                    <option value="経堂店">経堂店</option>
                                    <option value="銀座店">銀座店</option>
                                    <option value="錦糸町店">錦糸町店</option>
                                    <option value="高円寺店">高円寺店</option>
                                    <option value="高円寺2号店">高円寺2号店</option>
                                    <option value="小平店">小平店</option>
                                    <option value="五反田店">五反田店</option>
                                    <option value="駒沢大学店">駒沢大学店</option>
                                    <option value="下北沢店">下北沢店</option>
                                    <option value="新小岩店">新小岩店</option>
                                    <option value="新桜台店">新桜台店</option>
                                    <option value="新宿店">新宿店</option>
                                    <option value="新中野店">新中野店</option>
                                    <option value="高田馬場店">高田馬場店</option>
                                    <option value="立川店">立川店</option>
                                    <option value="千歳船橋店">千歳船橋店</option>
                                    <option value="調布中央口店">調布中央口店</option>
                                    <option value="調布東口店">調布東口店</option>
                                    <option value="中野店">中野店</option>
                                    <option value="中目黒店">中目黒店</option>
                                    <option value="西日暮里店">西日暮里店</option>
                                    <option value="人形町店">人形町店</option>
                                    <option value="練馬店">練馬店</option>
                                    <option value="野方店">野方店</option>
                                    <option value="白山店">白山店</option>
                                    <option value="八王子店">八王子店</option>
                                    <option value="八王子みなみ野店">八王子みなみ野店</option>
                                    <option value="東中野店">東中野店</option>
                                    <option value="ひばりヶ丘店">ひばりヶ丘店</option>
                                    <option value="二子玉川店">二子玉川店</option>
                                    <option value="府中店">府中店</option>
                                    <option value="町田店">町田店</option>
                                    <option value="町屋店">町屋店</option>
                                    <option value="瑞江店">瑞江店</option>
                                    <option value="三鷹店">三鷹店</option>
                                    <option value="森下店">森下店</option>
                                    <option value="大口店">大口店</option>
                                    <option value="小田急相模原店">小田急相模原店</option>
                                    <option value="上大岡店">上大岡店</option>
                                    <option value="川崎店">川崎店</option>
                                    <option value="関内店">関内店</option>
                                    <option value="菊名店">菊名店</option>
                                    <option value="新横浜店">新横浜店</option>
                                    <option value="イオン茅ヶ崎中央店">イオン茅ヶ崎中央店</option>
                                    <option value="鶴見店">鶴見店</option>
                                    <option value="平塚店">平塚店</option>
                                    <option value="二俣川店">二俣川店</option>
                                    <option value="本厚木店">本厚木店</option>
                                    <option value="武蔵小杉店">武蔵小杉店</option>
                                    <option value="武蔵新城店">武蔵新城店</option>
                                    <option value="大和店">大和店</option>
                                    <option value="横浜店">横浜店</option>
                                </select>
                                <p id="errorGym" class="error-message">店舗を選択してください。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                ご購入されるプラン
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input id="S20" class="plan-radio" type="radio" name="plan" value="S20">
                                <label for="S20" class="plan-label link-over">
                                    <span class="plan-name">S20</span>
                                    <span><b>¥9,000</b>（税込 ¥9,900）</span>
                                </label>
                                <input id="M20" class="plan-radio" type="radio" name="plan" value="M20">
                                <label for="M20" class="plan-label link-over">
                                    <span class="plan-name">M20</span>
                                    <span><b>¥18,000</b>（税込 ¥19,800）</span>
                                </label>
                                <input id="L20" class="plan-radio" type="radio" name="plan" value="L20">
                                <label for="L20" class="plan-label link-over">
                                    <span class="plan-name">L20</span>
                                    <span><b>¥27,000</b>（税込 ¥29,700）</span>
                                </label>
                                <input id="S40" class="plan-radio" type="radio" name="plan" value="S40">
                                <label for="S40" class="plan-label link-over">
                                    <span class="plan-name">S40</span>
                                    <span><b>¥18,000</b>（税込 ¥19,800）</span>
                                </label>
                                <input id="M40" class="plan-radio" type="radio" name="plan" value="M40">
                                <label for="M40" class="plan-label link-over">
                                    <span class="plan-name">M40</span>
                                    <span><b>¥36,000</b>（税込 ¥39,600）</span>
                                </label>
                                <input id="L40" class="plan-radio" type="radio" name="plan" value="L40">
                                <label for="L40" class="plan-label link-over">
                                    <span class="plan-name">L40</span>
                                    <span><b>¥54,000</b>（税込 ¥59,400）</span>
                                </label>
                                <p id="errorPlan" class="error-message">プランを選択してください。</p>
                            </div>
                        </div>
                        <div class="tab-panel tab1-panel active">
                            <div class="input-area">
                                <div class="headline">
                                    開始日
                                    <span class="req">必須</span>
                                </div>
                                <div class="input">
                                    <input id="date" type="date" name="start_date"
                                        value="<?php echo isset($formData['selected_date']) ? htmlspecialchars($formData['selected_date']) : ''; ?>">
                                    <p id="errorDate" class="error-message">開始日が無効です。</p>
                                </div>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                ご購入されるオプション
                            </div>
                            <div class="input">
                                <!-- <input id="option1" class="option-checkbox" type="checkbox" name="option" value="プロテイン">
                                <label for="option1" class="option-label">
                                    <span class="option-name">プロテイン</span>
                                    <span class="option-price">
                                        <b>¥450/回</b>
                                        （税込 ¥495）
                                    </span>
                                </label> -->
                                <!-- <input id="option2" class="option-checkbox" type="checkbox" name="option"
                                    value="シューズお預かり">
                                <label for="option2" class="option-label">
                                    <span class="option-name">シューズお預かり</span>
                                    <span class="option-price">
                                        <b>¥900/月</b>
                                        （税込 ¥990）
                                    </span>
                                </label>
                                <input id="option3" class="option-checkbox" type="checkbox" name="option"
                                    value="食事サポート2週間" data-group="food-support">
                                <label for="option3" class="option-label">
                                    <span class="option-name">食事サポート2週間</span>
                                    <span class="option-price">
                                        <b>¥10,000</b>
                                        （税込 ¥11,000）
                                    </span>
                                </label>
                                <input id="option4" class="option-checkbox" type="checkbox" name="option"
                                    value="食事サポート4週間" data-group="food-support">
                                <label for="option4" class="option-label">
                                    <span class="option-name">食事サポート4週間</span>
                                    <span class="option-price">
                                        <b>¥18,000</b>
                                        （税込 ¥19,800）
                                    </span>
                                </label> -->

                                <div class="option-box">
                                    <div class="label">
                                        <p class="option-name">シューズお預かり</p>
                                        <p class="option-price">
                                            + <b>¥900/月</b>
                                            （税込 ¥990）
                                        </p>
                                    </div>
                                    <div class="action">
                                        
                                 <span class="minus btn link-over"></span>
                                        <span>0</span>
                                     
                                               <span class="plus btn link-over"></span>
                                           

                                        <input type="hidden" name="option" value="シューズお預かり">
                                    </div>
                                </div>
                                <div class="option-box">
                                    <div class="label">
                                        <p class="option-name">食事サポート2週間</p>
                                        <p class="option-price">
                                            + <b>¥10,000</b>
                                            （税込 ¥11,000）
                                        </p>
                                    </div>
                                    <div class="action">
                                <span class="minus btn link-over"></span>
                                        <span>0</span>
                                     
                                               <span class="plus btn link-over"></span>
                                        <input type="hidden" name="option" value="食事サポート2週間" data-group="food-support">
                                    </div>
                                </div>
                                <div class="option-box">
                                    <div class="label">
                                        <p class="option-name">食事サポート4週間</p>
                                        <p class="option-price">
                                            + <b>¥18,000</b>
                                            （税込 ¥19,800）
                                        </p>
                                    </div>
                                    <div class="action">
                                    <span class="minus btn link-over"></span>
                                        <span>0</span>
                                     
                                               <span class="plus btn link-over"></span>
                                        <input type="hidden" name="option" value="食事サポート4週間" data-group="food-support">
                                    </div>
                                </div>
                                ※固定費用として、共用設備費が月額¥300/人（税込 ¥330）がかかります。
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                カード番号
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="cardNo" id="cardNo" value="" placeholder="1234 5678 9012 3456"
                                    maxlength="19" inputmode="numeric" required />
                                <p id="errorCard" class="error-message">カード番号が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                有効期限 (月年)
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="expire" id="expire"
                                    value="<?php echo isset($formData['expire']) ? htmlspecialchars($formData['expire']) : ''; ?>"
                                    placeholder="0926" maxlength="4" inputmode="numeric" required />
                                <p id="errorExpire" class="error-message">有効期限が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                セキュリティコード
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="securityCode" id="securityCode"
                                    value="<?php echo isset($formData['securityCode']) ? htmlspecialchars($formData['securityCode']) : ''; ?>"
                                    placeholder="例）123" maxlength="4" required />
                                <p id="errorSecurityCode" class="error-message">セキュリティコードが無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                カード名義人
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="holderName" id="holderName"
                                    value="<?php echo isset($formData['holderName']) ? htmlspecialchars($formData['holderName']) : ''; ?>"
                                    placeholder="例）TARO YAMADA" required />
                                <p id="errorHolderName" class="error-message">カード名義人が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                キャンペーンコード
                            </div>
                            <div class="input">
                                <div class="code-wrap">
                                    <input type="text" name="campaign_code" id="campaign_code" value=""
                                        placeholder="" />
                                    <span class="code-btn link-over">照合</span>
                                </div>
                                <p id="campaign_code_txt"></p>
                            </div>
                        </div>

                        <div class="buy-contents">
                            <h2>ご購入内容</h2>
                            <div class="amount">
                                <div class="admission"></div>
                                <div class="plan"></div>
                                <div class="option"></div>
                                <div class="equipment"></div>
                                <div class="discount"></div>
                            </div>
                        </div>

                        <div class="total-price">
                            <div class="sum-price">
                                <ul class="list">
                                    <li>初回合計</li>
                                    <li><span class="exclude-tax">¥0</span> × 10% = <span class="include-tax">¥0</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="detail">
                                <ul class="list">
                                    <li>次月以降支払い</li>
                                    <li><span id="next">¥0</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="terms-check-box">
                            <p class="ttl">利用契約の確認</p>
                            <div class="box">
                                <div class="link">
                                    <span>URL</span><a href="https://applegym.jp/tos/" class="link-over"
                                        target="_blank">利用契約の確認</a>
                                </div>
                                <label for="terms" class="link-over">
                                    <input type="checkbox" name="terms" id="terms">
                                    「利用契約」を確認しました
                                </label>
                                <p id="errorTerms" class="error-message">利用契約が未確認です。</p>
                            </div>
                        </div>

                        <div class="form-btn">
                            <div class="tab-panel tab1-panel active">
                                <button data-action="../../card-form.php" class="link-over submit-button">決済する</button>
                            </div>
                            <div class="tab-panel tab2-panel">
                                <button data-action="../../card-register.php"
                                    class="link-over submit-button">登録する</button>
                            </div>
                        </div>

                        <input type="hidden" name="first_price" id="first_price" value="" />
                        <input type="hidden" name="subscription_price" id="subscription_price" value="" />
                        <!-- 合計金額 -->
                        <input type="hidden" name="total_amount_price" id="total_amount_price" value="" />
                        <!-- ./合計金額 -->
                        <input type="hidden" name="campaign_discount" id="campaign_discount" value="" />
                        <input type="hidden" name="selected_plan" id="selected_plan" value="" />
                        <input type="hidden" name="selected_option" id="selected_option" value="" />
                        <input type="hidden" name="selected_date" id="selected_date"
                            value="<?php echo isset($formData['selected_date']) ? htmlspecialchars($formData['selected_date']) : ''; ?>" />
                        <input type="hidden" name="equipment" id="equipment" value="共用設備費" />
                        <input type="hidden" name="token" id="token" value="" />
                        <input type="hidden" name="page_type" id="page_type" value="type1" />
                    </form>
                </div>
            </div>
            <div class="fixed-bar">
                <div class="inner">
                    <p class="ttl">合計</p>
                    <p class="price">
                        <b>¥0</b>
                        （税込 <span>¥0</span>）
                    </p>
                </div>
            </div>
        </div>
        <!-- /.contents -->
        <footer class="footer">
            <p class="copyright">© 2018 Apple GYM</p>
        </footer>
    </div>
    <!-- /.wrapper -->

    <script src="https://stg-static.smbc-gp.co.jp/payment/js/mp-token.js"></script>
    <script src="../../../js/jquery-3.3.1.min.js"></script>
    <script>
    (function($) {
        $(function() {


 // ここから＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝

(function($) {
    $(function() {
        const tax_rate = 1.1; // 消費税

        let today_contents = $("#date");
        let selected_rate = 2; // 選択した日付の金額算出率
        let selected_value = null; // 選択した日付の値

        const equipment_price = 300; // 共用設備費（通常時）
        let plan_price = 0; // プラン金額
        let plan_times = 0; // プラン回数
        let times_option_price = 0; // オプション金額（回数オプション）
        let period_option_price = 0; // オプション金額（月オプション）
        let food_option_price = 0; // オプション金額（食事サポートオプション）
        let buy_count = 0; // 回数オプションの合計購入数

        let admission_fee = 10000; // 入会金金額

        let first_plan_discount_price = 0; // プラン割引金額
        let subscription_plan_discount_price = 0;
        let admission_fee_discount_price = 0; // 入会金割引金額

        var target = "tab1";
        let buy_contents = $(".buy-contents .amount");

        let first_price = 0; // 初月支払い（税別）
        let first_tax_price = 0; // 初月支払い（税込）
        let first_price_contents = $(".total-price #first");

        let subscription_price = 0; // 2ヶ月目以降の定額支払い（税別）
        let subscription_tax_price = 0; // 2ヶ月目以降の定額支払い（税込）
        let subscription_price_contents = $(".total-price #next");

        let first_option_price = 0; // 初月オプション支払い（税別）
        let subscription_option_price = 0; // 2ヶ月目以降支払い（税別）

        let total_price = 0; // 合計金額（税別）
        let total_price_contents = $(".total-price .exclude-tax, .fixed-bar .price b");
        let total_tax_price = 0; // 合計金額（税込）
        let total_tax_price_contents = $(".total-price .include-tax, .fixed-bar .price span");

        let get_plan_field = $("#selected_plan").val(); // プランデータ
        let get_option_field = $("#selected_option").val(); // オプションデータ
        let get_coupon_field = $("#campaign_discount").val(); // クーポンデータ

        let total_amount_price = $("#total_amount_price"); // 合計金額

        // キャンペーンコードフラグ
        let campaign_input_flag = true; // 追加

        let cardExpiredValue = null; // カードの有効期限
        let terms_check_flag = false // 利用契約

        // ペア入会のフラグと処理を追加
        let pair_entry_flag = false;

        $("#pair").on("change", function() {
            pair_entry_flag = $(this).is(":checked");
            
            // 初回合計の表示を更新
            updateFirstTotalDisplay();
            
            // ペア割引の表示更新
            if(pair_entry_flag) {
                // 表示を更新
                $(".buy-contents .amount .pair-discount").remove();
                if(plan_price > 0) {
                    let single_price = plan_price + equipment_price;
                    let pair_price = single_price * 2;
                    let discounted_price = Math.round(pair_price * 0.8);
                    
                    $(".buy-contents .amount").append(
                        `<div class="pair-discount">
                            <ul>
                                <li>ペア入会割引（20%OFF）</li>
                                <li><b>- ¥${Math.round(pair_price * 0.2).toLocaleString()}</b></li>
                            </ul>
                        </div>`
                    );
                }
            } else {
                $(".pair-discount").remove();
            }
            
            // オプションの表示を更新
            updateOptionPriceWithQuantity();
            
            calculatePrice();
        });

        // 初回合計の表示を更新する関数を追加
        function updateFirstTotalDisplay() {
            const firstTotalElement = $(".total-price .sum-price .list li:first");
            if(pair_entry_flag) {
                firstTotalElement.text("初回合計（ペア）");
            } else {
                firstTotalElement.text("初回合計");
            }
        }

        // オプション数量の処理を追加

let option_quantities = {};

$(".option-box .plus, .option-box .minus").on("click", function() {
    const $box = $(this).closest(".option-box");
    const $counter = $box.find(".action span:not(.btn)");
    const optionName = $box.find("input[name='option']").val();
    let count = parseInt($counter.text());
    
    // デバッグ用のログ追加
    console.log("Clicked element classes:", $(this).attr("class"));
    console.log("Has plus class:", $(this).hasClass("plus"));
    console.log("Has minus class:", $(this).hasClass("minus"));
    console.log("Current count:", count);
    console.log("Option name:", optionName);
    
    if($(this).hasClass("plus")) {
        count = Math.min(count + 1, 5);
        console.log("Plus clicked - new count:", count);
    } else if($(this).hasClass("minus")) {
        count = Math.max(count - 1, 0);
        console.log("Minus clicked - new count:", count);
    }
    
    $counter.text(count);
    option_quantities[optionName] = count;
    
    updateOptionPriceWithQuantity();
    
    // 食事サポートの相互排他チェックを実行
    checkMealSupportExclusion();

    calculatePrice();
});

        // オプション価格計算（数量対応版）を追加
        function updateOptionPriceWithQuantity() {
            const selected_option = $(".buy-contents .amount .option");
            selected_option.empty();
            
            first_option_price = 0;
            subscription_option_price = 0;
            food_option_price = 0;
            
            $(".option-box").each(function() {
                const $box = $(this);
                const optionName = $box.find("input[name='option']").val();
                const quantity = parseInt($box.find(".action span:not(.btn)").text());
                
                if(quantity > 0) {
                    let price = 0;
                    let type = 0;
                    
                    if(optionName === "シューズお預かり") {
                        price = 900;
                        type = 2;
                    } else if(optionName === "食事サポート2週間") {
                        price = 10000;
                        type = 3;
                    } else if(optionName === "食事サポート4週間") {
                        price = 18000;
                        type = 3;
                    }
                    
                    // ペア入会時の料金計算
                    if(pair_entry_flag) {
                        price = price * 2; // ペア時は2倍
                    }
                    
                    if(type === 2) {
                        let monthlyTotal = price * quantity;
                        
                        if (target == 'tab1') {
                            first_option_price += monthlyTotal * (selected_rate - 1);
                        } else if (target == 'tab2') {
                            first_option_price += monthlyTotal;
                        }
                        subscription_option_price += monthlyTotal;
                        
                        let displayText = `${optionName} × ${quantity}`;
                        if(pair_entry_flag) {
                            displayText += '（ペア）';
                        }
                        selected_option.append(
                            `<ul>
                                <li>${displayText}</li>
                                <li>¥${monthlyTotal.toLocaleString()} × ${selected_rate} = ¥${(monthlyTotal * selected_rate).toLocaleString()}</li>
                            </ul>`
                        );
                    } else if(type === 3) {
                        food_option_price += price * quantity;
                        
                        let displayText = `${optionName} × ${quantity}`;
                        if(pair_entry_flag) {
                            displayText += '（ペア）';
                        }
                        selected_option.append(
                            `<ul>
                                <li>${displayText}</li>
                                <li>¥${(price * quantity).toLocaleString()}</li>
                            </ul>`
                        );
                    }
                }
            });
        }

        // 日付設定
        function dateFormat(today, format) {
            format = format.replace("YYYY", today.getFullYear());
            format = format.replace("MM", ("0" + (today.getMonth() + 1)).slice(-2));
            format = format.replace("DD", ("0" + today.getDate()).slice(-2));
            return format;
        }
        const date = dateFormat(new Date(), 'YYYY-MM-DD');
        const today = new Date();
        const tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);
        const threeMonthsLater = new Date();
        threeMonthsLater.setMonth(today.getMonth() + 2);
        const tomorrowDate = dateFormat(tomorrow, 'YYYY-MM-DD');
        const threeMonthsLaterDate = dateFormat(threeMonthsLater, 'YYYY-MM-DD');

        // today_contents.attr('min', date);
        today_contents.attr('min', tomorrowDate);
        today_contents.attr('max', threeMonthsLaterDate);

        function getDay(date_value) {
            if (target == 'tab1') {
                // 選択している日付の取得
                if (date_value) { // 選択している場合
                    selected_value = parseInt(String(date_value).split("-")[2], 10);
                    if (selected_value >= 1 && selected_value <= 14) {
                        selected_rate = 2;
                    } else {
                        selected_rate = 1.5;
                    }
                } else {
                    selected_rate = 2;
                }
            } else if (target == 'tab2') {
                selected_rate = 1;
            }

            return selected_rate;
        }

        function updateSelectedRate() {
            if (target == 'tab1') {
                // 選択している日付の取得
                let date_value = today_contents.val();
                selected_rate = getDay(date_value);
            } else if (target == 'tab2') {
                selected_rate = 1;
            }

            return selected_rate;
        }

        // 計算処理
        function calculatePrice() {
            makeFirstPeriodPrice(); // 初月算出（税別）
            makeFirstPeriodTaxPrice(); // 初月算出（税込）
            makeSubscriptionPeriodPrice(); // 2ヶ月目以降算出（税別）
            makeSubscriptionPeriodTaxPrice(); // 2ヶ月目以降算出（税込）
            makeExcludeTotalPrice(); // 税別合計金額算出
            makeIncludeTotalPrice(); // 合計金額算出
            updateEquipmentPrice(); // 共用設備費
            updateAdmissionPrice(); // 入会金計算
        }

        // 税別合計金額算出
        function makeExcludeTotalPrice() {
            if (target == 'tab1') { // 新規ゲストの場合
                total_price = first_price + subscription_price;
                total_price_contents.text("¥" + total_price.toLocaleString());
                // total_price_contents.text("¥" + total_price.toLocaleString());
            } else if (target == 'tab2') { // 既存ゲストの場合
                total_price = first_price;
                total_price_contents.text("¥" + total_price.toLocaleString());
                // total_price_contents.text("¥" + total_price.toLocaleString());
            }

            return total_price;
        }

        // 合計金額算出
        function makeIncludeTotalPrice() {
            // total_tax_price = Math.round((first_price + subscription_price) * tax_rate);
            total_tax_price = Math.round(total_price * tax_rate);
            total_tax_price_contents.text("¥" + total_tax_price.toLocaleString());

            total_amount_price.val(total_tax_price); // 合計金額

            return total_tax_price;
        }

        // 初月算出（新規ゲスト）（税別）- 修正版
        function makeFirstPeriodPrice() {
            let base_price;
            
            if (target == 'tab1') {
                base_price = ((plan_price + equipment_price) * (selected_rate - 1)) + 
                             first_option_price + food_option_price + admission_fee - 
                             admission_fee_discount_price - first_plan_discount_price;
            } else if (target == 'tab2') {
                base_price = (plan_price + equipment_price + first_option_price + 
                             food_option_price) - first_plan_discount_price;
            }
            
            // ペア割引の適用
            if(pair_entry_flag) {
                // ペア時はプラン料金×2の20%OFF
                let pair_plan_price = plan_price * 2 * 0.8;
                let pair_equipment_price = equipment_price * 2; // ペア時の共用設備費（300円 × 2 = 600円）
                
                if (target == 'tab1') {
                    base_price = (pair_plan_price * (selected_rate - 1)) + 
                                (pair_equipment_price * (selected_rate - 1)) +
                                first_option_price + food_option_price + 
                                admission_fee - admission_fee_discount_price - first_plan_discount_price;
                } else {
                    base_price = pair_plan_price + pair_equipment_price + 
                                first_option_price + food_option_price - 
                                first_plan_discount_price;
                }
            }
            
            first_price = base_price;
            return first_price;
        }

        // 初月算出（税込）
        function makeFirstPeriodTaxPrice() {
            const first_amount = $("#first_price");
            first_tax_price = Math.round(first_price * tax_rate);
            first_price_contents.text("¥" + first_tax_price.toLocaleString());
            first_amount.val(first_tax_price);

            return first_tax_price;
        }

        // 2ヶ月目以降算出（税別）- 修正版
        function makeSubscriptionPeriodPrice() {
            let base_price = (plan_price - subscription_plan_discount_price) + 
                             equipment_price + subscription_option_price;
            
            if(pair_entry_flag) {
                // ペア時はプラン料金×2の20%OFF + 共用設備費（ペア時は2人分）
                let pair_plan_price = (plan_price - subscription_plan_discount_price) * 2 * 0.8;
                let pair_equipment_price = equipment_price * 2; // 300円 × 2 = 600円
                base_price = pair_plan_price + pair_equipment_price + subscription_option_price;
            }
            
            subscription_price = base_price;
            return subscription_price;
        }
        
        // 2ヶ月目以降算出（税込）
        function makeSubscriptionPeriodTaxPrice() {
            const subsctiption_amount = $("#subscription_price");
            subscription_tax_price = Math.round(subscription_price * tax_rate);
            subscription_price_contents.text("¥" + subscription_tax_price.toLocaleString());
            subsctiption_amount.val(subscription_tax_price);

            return subscription_tax_price;
        }

        // 共用設備費
        function updateEquipmentPrice() {
            const equipment_cost = $(".buy-contents .amount .equipment");

            equipment_cost.empty(); // 一度クリア

            // ペア入会時の共用設備費計算
            let equipment_cost_price;
            if(pair_entry_flag) {
                equipment_cost_price = Math.round(equipment_price * 2 * selected_rate); // ペア時は300円×2=600円
            } else {
                equipment_cost_price = Math.round(equipment_price * selected_rate); // 通常時は300円
            }

            equipment_cost.append(
                `<ul>
                    <li>共用設備費 <span class="period">${selected_rate}</span>ヶ月</li>
                    <li>¥${equipment_cost_price.toLocaleString()}</li>
                </ul>`
            );
        }

        // プラン計算
        function updatePlanPrice(plan_data) {
            const selected_plan = $(".buy-contents .amount .plan");

            selected_plan.empty(); // 一度クリア

            let plan_name = plan_data.name;
            plan_price = plan_data.price;
            plan_times = plan_data.times;
            let plan_total_price;
            if (target == 'tab1') {
                plan_total_price = Math.round(plan_price * selected_rate); // 再計算
            } else if (target == 'tab2') {
                plan_total_price = plan_price; // 再計算
            }

            selected_plan.append(
                `<ul>
                    <li>${plan_name}プラン <span class="period">${selected_rate}</span>ヶ月</li>
                    <li>¥${plan_price.toLocaleString()} ×<span class="period">${selected_rate}</span> = ¥${plan_total_price.toLocaleString()}</li>
                </ul>`
            );
        }

        // オプション計算
        function updateOptionPrice(selectedOptions) {
            const selected_option = $(".buy-contents .amount .option");

            selected_option.empty(); // 既存の内容をクリア
            times_option_price = 0; // オプション金額（回数オプション）
            period_option_price = 0; // オプション金額（月オプション）
            food_option_price = 0; // オプション金額（食事サポートオプション）
            first_option_price = 0; // 初月オプション支払い（税別）
            subscription_option_price = 0; // 2ヶ月目以降支払い（税別）

            if (target == 'tab1') {
                buy_count = (plan_times * (selected_rate - 1)) +
                    plan_times; // 初月含む回数オプションの購入数
            } else if (target == 'tab2') {
                buy_count = plan_times // 1月分の回数オプションの購入数
            }

            selectedOptions.forEach(option => { // 回数オプション
                if (option.type === 1) {
                    times_option_price += option.price * buy_count;

                    if (target == 'tab1') {
                        first_option_price += option.price * (plan_times * (selected_rate - 1));
                    } else if (target == 'tab2') {
                        first_option_price += option.price * buy_count;
                    }
                    subscription_option_price += option.price * plan_times;

                    selected_option.append(
                        `<ul><li>${option.name}</li><li>¥${option.price.toLocaleString()} × ${buy_count} = ¥${(option.price * buy_count).toLocaleString()}</li></ul>`
                    );

                } else if (option.type === 2) { // 月オプション

                    if (target == 'tab1') {
                        first_option_price += option.price * (selected_rate - 1);
                    } else if (target == 'tab2') {
                        first_option_price += option.price;
                    }
                    subscription_option_price += option.price;

                    // period_option_price += option.price * selected_rate;

                    selected_option.append(
                        `<ul><li>${option.name}</li><li>¥${option.price.toLocaleString()} × ${selected_rate} = ¥${(option.price * selected_rate).toLocaleString()}</li></ul>`
                    );
                } else if (option.type === 3) { // 食事サポートオプション
                    food_option_price += option.price;

                    selected_option.append(
                        `<ul><li>${option.name}</li><li>¥${option.price.toLocaleString()}</li></ul>`
                    );
                } else {}
            });
        }

        // クーポン計算
        function updateCouponPrice(coupon_data) {
            const selected_coupon = $(".buy-contents .amount .discount");

            selected_coupon.empty(); // 一度クリア

            first_plan_discount_price = 0; // プラン割引金額（初回）
            subscription_plan_discount_price = 0; // プラン割引金額（2ヶ月目以降）
            admission_fee_discount_price = 0; // 入会金割引金額

            coupon_data.forEach(campaign => {
                if (campaign.type === 1) { // 昼割プラン割引

                    subscription_plan_discount_price = plan_price * campaign.discount;

                    if (target == 'tab1') {
                        first_plan_discount_price = (plan_price * (selected_rate - 1)) *
                            campaign.discount;
                        selected_coupon.append(
                            `<ul><li>${campaign.description}</li><li><b>- ¥${(first_plan_discount_price + subscription_plan_discount_price).toLocaleString()}</b></li></ul>`
                        );
                    } else if (target == 'tab2') {
                        first_plan_discount_price = plan_price * campaign.discount;
                        selected_coupon.append(
                            `<ul><li>${campaign.description}</li><li><b>- ¥${first_plan_discount_price.toLocaleString()}</b></li></ul>`
                        );
                    }

                } else if (campaign.type === 2) { // 入会金割引

                    if (target == 'tab1') {
                        admission_fee_discount_price = campaign.discount;

                        selected_coupon.append(
                            `<ul><li>${campaign.description}</li><li><b>- ¥${admission_fee_discount_price.toLocaleString()}</b></li></ul>`
                        );
                    }

                } else if (campaign.type === 3) { // 初月プラン割引

                    if (target == 'tab1') {
                        first_plan_discount_price = (plan_price * (selected_rate - 1)) *
                            campaign.discount;

                    } else if (target == 'tab2') {
                        first_plan_discount_price = plan_price * campaign.discount;
                    }

                    selected_coupon.append(
                        `<ul><li>${campaign.description}</li><li><b>- ¥${first_plan_discount_price.toLocaleString()}</b></li></ul>`
                    );
                }
            });
        }

        // 入会金計算
        function updateAdmissionPrice() {
            const selected_admission = $(".buy-contents .amount .admission");
            selected_admission.empty(); // 一度クリア

            if (target == 'tab1') {
                if(pair_entry_flag) {
                    admission_fee = 10000; // ペア時は2人で10,000円（1名分無料）
                } else {
                    admission_fee = 10000; // 通常時は10,000円
                }
            } else if (target == 'tab2') {
                admission_fee = 0;
            }
            if(pair_entry_flag && target == 'tab1') {
                selected_admission.append(
                    `<ul>
                        <li>入会金（ペア）</li>
                        <li>¥${admission_fee.toLocaleString()}（2人分）</li>
                    </ul>`
                );
            } else {
                selected_admission.append(
                    `<ul>
                        <li>入会金</li>
                        <li>¥${admission_fee.toLocaleString()}</li>
                    </ul>`
                );
            }
        }

        // タブ切り替え
        $(".tab-btn").on("click", function() {
            $(".tab-btn").removeClass("active");
            $(this).addClass("active");

            // 表示するタブのIDを取得
            target = $(this).data("target");

            // 対応するタブの表示切り替え
            $(".tab-panel").removeClass("active");
            $("." + target + "-panel").addClass("active");

            if (target == 'tab1') {
                $("#date").prop("disabled", false);
            } else if (target == 'tab2') {
                $("#date").prop("disabled", true);
            }

            updateSelectedRate(); //支払い期限数（既存会員の場合は1）

            updateAdmissionPrice(); // 入会金再計算

            // 選択されているプランを取得
            get_plan_field = $("#selected_plan").val(); // プランデータ
            if (get_plan_field) {
                let get_plan_data = JSON.parse(get_plan_field); // プランデータを取得
                updatePlanPrice(get_plan_data); // プラン再計算
            }

            // 選択されているオプションを取得
            get_option_field = $("#selected_option").val(); // オプションデータ
            if (get_option_field) {
                let get_option_data = JSON.parse(get_option_field)
                updateOptionPrice(get_option_data); // オプション再計算
            }

            // 選択されているクーポンを取得
            get_coupon_field = $("#campaign_discount").val(); // クーポンデータ
            if (get_coupon_field) {
                let get_coupon_data = JSON.parse(
                    get_coupon_field); // クーポンデータを取得
                updateCouponPrice(get_coupon_data); // クーポン再計算
            }

            calculatePrice(); // 金額計算
        });

        // キャンペーンコード入力チェック 追加
        $("#campaign_code").on("change", function() {
            const value = $(this).val().trim();
            if (value !== "") {
                campaign_input_flag = false;
            }
        });

        // クーポンコード
        $(".code-btn").on("click", function() {
            const code = $("#campaign_code").val();
            const discount = $("#campaign_discount");
            const codeTxt = $("#campaign_code_txt");
            const code_amount = $(".buy-contents .amount .discount");

            if (code !== "") {
                $.ajax({
                    url: "../../../check_form.php",
                    type: "POST",
                    data: {
                        campaign_code: code
                    },
                    dataType: "json",
                    success: function(response) {

                        if (response.length > 0) {
                            let messages = [];
                            response.forEach(campaign => {
                                messages.push(campaign.description);
                            });
                            codeTxt.text(messages.join(" / ")); // キャンペーン情報を表示

                            discount.val(JSON.stringify(response));

                            updateCouponPrice(response); // 再計算

                            updateAdmissionPrice(); // 入会金再計算

                            // 金額計算
                            calculatePrice();
                        } else {
                            codeTxt.text("無効なキャンペーンコードです");
                            discount.val("");
                            code_amount.empty(); // 一度クリア

                            first_plan_discount_price = 0; // プラン割引金額（初回）
                            subscription_plan_discount_price = 0; // プラン割引金額（2ヶ月目以降）
                            admission_fee_discount_price = 0; // 入会金割引金額

                            updateAdmissionPrice(); // 入会金再計算

                            // 金額計算
                            calculatePrice();
                        }
                    },
                    error: function() {
                        alert("通信エラーが発生しました。");
                    }
                });
            }

            // キャンペーンコード入力チェック 追加
            campaign_input_flag = true;
        });

        // 日付
        $("#date").on("change", function() {
            // 選択している日付の取得
            let date_value = today_contents.val();
            // selected_rateを計算
            selected_rate = getDay(date_value);

            // 選択されているプランを取得
            get_plan_field = $("#selected_plan").val();
            if (get_plan_field) {
                let get_plan_data = JSON.parse(get_plan_field);
                updatePlanPrice(get_plan_data); // プラン再計算
            }

            // 選択されているクーポンを取得
            get_coupon_field = $("#campaign_discount").val();
            if (get_coupon_field) {
                let get_coupon_data = JSON.parse(get_coupon_field);
                updateCouponPrice(get_coupon_data); // クーポン再計算
            }

            // オプションの再計算
            updateOptionPriceWithQuantity();

            $("#selected_date").val(date_value);

            // 金額計算
            calculatePrice();
        });

        // 店舗選択（追加）
        $("#gym").on("change", function() {
            const gym = $(this).val();
            const plan_field = $("#selected_plan");

            $.ajax({
                url: "../../../check_form.php",
                type: "POST",
                data: {
                    gym_data: gym,
                },
                dataType: "json",
                success: function(response) {
                    if (response) {
                        // console.log(response);
                        // 受け取った金額情報でプラン金額を更新
                        for (const plan in response) {
                            let name = response[plan]["name"];
                            const price = response[plan]["price"];
                            const priceElement = $(`#price_${name}`);
                            if (priceElement.length) {
                                priceElement.html(`<b>¥${price.toLocaleString('ja-JP')}</b>（税込 ¥${Math.round(price * 1.1).toLocaleString('ja-JP')}）`);
                            }

                            if(plan_field.val() != "") {
                                const parsed_plan_field = JSON.parse(plan_field.val());
                                if(parsed_plan_field.name == response[plan]["name"]) {
                                    plan_field.val(JSON.stringify(response[plan])); // プラン情報を保存
                                    updatePlanPrice(response[plan]); // 再計算

                                    // 選択されているクーポンを取得
                                    get_coupon_field = $("#campaign_discount")
                                        .val(); // クーポンデータ
                                    if (get_coupon_field) {
                                        let get_coupon_data = JSON.parse(
                                            get_coupon_field); // クーポンデータを取得
                                        updateCouponPrice(get_coupon_data); // クーポン再計算
                                    }

                                    $(".option-checkbox").trigger("change");
                                    $("#date").trigger("change");

                                    // 金額計算
                                    calculatePrice();
                                }
                            }
                        }
                    }
                },
                error: function() {
                    alert("通信エラーが発生しました。");
                }
            });
        });

        // プラン
        $(".plan-radio").on("change", function() {
            const plan = $(this).val();
            const plan_field = $("#selected_plan");
            const selected_plan = $(".buy-contents .amount .plan");

            const options = $("#selected_option").val();

            // 選択店舗の取得（追加）
            const selected_gym = $("#gym").val();

            // selected_rate = getDay(selected_value);

            if (plan !== "") {
                $.ajax({
                    url: "../../../check_form.php",
                    type: "POST",
                    data: {
                        plan_data: plan,
                        selected_gym: selected_gym,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response) {
                            plan_field.val(JSON.stringify(response)); // プラン情報を保存
                            updatePlanPrice(response); // 再計算

                            // 選択されているクーポンを取得
                            get_coupon_field = $("#campaign_discount")
                                .val(); // クーポンデータ
                            if (get_coupon_field) {
                                let get_coupon_data = JSON.parse(
                                    get_coupon_field); // クーポンデータを取得
                                updateCouponPrice(get_coupon_data); // クーポン再計算
                            }

                            $(".option-checkbox").trigger("change");
                            $("#date").trigger("change");

                            // 金額計算
                            calculatePrice();
                        } else {
                            selected_plan.empty();
                            plan_field.val("");
                        }
                    },
                    error: function() {
                        alert("通信エラーが発生しました。");
                    }
                });
            }
        });

        // オプション
        $(".option-checkbox").on("change", function() {
            const option_field = $("#selected_option");
            // const selected_option = $(".buy-contents .amount .option");

            if ($(this).is(":checked")) {
                let group = $(this).data("group");
                $(".option-checkbox[data-group='" + group + "']").not(this).prop("checked",
                    false);
            }

            let selectedOptions = [];
            let ajaxRequests = [];

            // `.option-checkbox:checked` のオプションごとにリクエストを送信
            $(".option-checkbox:checked").each(function() {
                const optionName = $(this).val();

                let request = $.ajax({
                    url: "../../../check_form.php",
                    type: "POST",
                    data: {
                        option_data: optionName
                    },
                    dataType: "json"
                }).done(function(response) {
                    if (response) {
                        selectedOptions.push({
                            name: response.name,
                            type: response.type,
                            price: response.price
                        });
                    }
                });

                ajaxRequests.push(request);
            });

            // すべてのリクエストが完了したら処理を実行
            $.when.apply($, ajaxRequests).done(function() {

                // 選択されているプランを取得
                if (get_plan_field) {
                    let get_plan_data = JSON.parse(get_plan_field); // プランデータを取得
                    updatePlanPrice(get_plan_data); // プラン再計算
                }

                // 選択されたオプションを input に保存
                option_field.val(JSON.stringify(selectedOptions));

                updateOptionPrice(selectedOptions); // オプション再計算

                // 金額計算
                calculatePrice();

            }).fail(function() {
                alert("通信エラーが発生しました。");
            });
        });

        $("#name, #email, #postCode, #state, #city, #line1, #cardNo, #expire, #securityCode, #holderName, .plan-radio,  #date, .tab-btn, #terms")
            .on("change", function() {
                const values = {
                    nameValue: $("#name").val(),
                    emailValue: $("#email").val(),
                    postCodeValue: $("#postCode").val(),
                    stateValue: $("#state").val(),
                    cityValue: $("#city").val(),
                    line1Value: $("#line1").val(),
                    cardNoValue: $("#cardNo").val(),
                    expireValue: $("#expire").val(),
                    securityCodeValue: $("#securityCode").val(),
                    holderNameValue: $("#holderName").val(),
                };

                // 選択されているかチェック
                const planValue = $("#selected_plan").val().trim();
                let dateValue;
                let dateFlag = false;
                if (target == 'tab1') {
                    dateValue = $("#selected_date").val().trim();
                    if (dateValue !== "") {
                        dateValue = true;
                    }
                } else if (target == 'tab2') {
                    dateValue = true;
                }

                // カードの有効期限
                const expiredValue = $("#expire").val();
                if (expiredValue.length === 4) {
                    const front = expiredValue.substring(0, 2);
                    const back = expiredValue.substring(2);
                    cardExpiredValue = back + front;
                }

                // 利用契約
                const termsValue = $("#terms");
                if (termsValue.is(':checked')) {
                    terms_check_flag = true;
                } else {
                    terms_check_flag = false;
                }

                // const isSelected = planValue !== "" && dateValue == true;
                // const allFieldsFilled = Object.values(values).every((value) => value.trim() !== "");

                // $(".submit-button").prop("disabled", !(allFieldsFilled));
            });

        $('.submit-button').on("click", function(event) {
            event.preventDefault(); // デフォルト動作を防ぐ

            if (campaign_input_flag == false) {
                alert("キャンペーンコードを照合してください。");
                return false;
            }

            let $form = $(this).parents('form');

            // 送信先URLをセット
            let actionUrl = $(this).data('action');
            $form.attr('action', actionUrl);

            // ボタンを無効化（連打防止）
            $(this).prop('disabled', true);

            // フォーム送信をトリガー
            $form.trigger('submit');
        });

        $("#form").on("submit", function(event) {
            // エラーチェック
            event.preventDefault();
            
            // ペア入会フラグの正しい設定
            $("#pair_entry_hidden").remove(); // 既存のを削除
            const pairEntryValue = pair_entry_flag ? "1" : "0";
            $('<input>').attr({
                type: 'hidden',
                id: 'pair_entry_hidden',
                name: 'pair_entry',
                value: pairEntryValue
            }).appendTo(this);
            
            // オプション数量の正しい設定
            $("#option_quantities_hidden").remove(); // 既存のを削除
            $('<input>').attr({
                type: 'hidden',
                id: 'option_quantities_hidden',
                name: 'option_quantities',
                value: JSON.stringify(option_quantities)
            }).appendTo(this);

            // カード番号
            const cardNumberInput = $("#cardNo").val().replace(/\s+/g, "");
            const errorCardMessage = $("#errorCard");
            if (isValidCardNumber(cardNumberInput)) {
                errorCardMessage.hide();
            } else {
                errorCardMessage.show();
            }

            // 有効期限
            // const expireInput = $("#expire").val().trim();
            const errorExpireMessage = $("#errorExpire");
            if (isValidExpireDate(cardExpiredValue)) {
                errorExpireMessage.hide();
            } else {
                errorExpireMessage.show();
            }

            // セキュリティコード
            const securityCodeInput = $("#securityCode").val().trim();
            const errorSecurityMessage = $("#errorSecurityCode");
            if (isValidSecurityCode(securityCodeInput)) {
                errorSecurityMessage.hide();
            } else {
                errorSecurityMessage.show();
            }

            // 郵便番号
            let postCodeInput = $("#postCode").val();
            const errorPostCodeyMessage = $("#errorPostCode");
            postCodeInput = postCodeInput.replace(/[０-９]/g, function(match) {
                return String.fromCharCode(match.charCodeAt(0) - 0xFEE0);
            });
            if (isValidPostCode(postCodeInput)) {
                errorPostCodeyMessage.hide();
            } else {
                errorPostCodeyMessage.show();
            }

            // 名前
            const nameInput = $("#name").val().trim();
            const errorNameMessage = $("#errorName");
            if (nameInput.length > 0) {
                errorNameMessage.hide();
            } else {
                errorNameMessage.show();
            }

            // メールアドレス
            const emailInput = $("#email").val().trim();
            const errorEmailMessage = $("#errorMail");
            if (isValidEmail(emailInput)) {
                errorEmailMessage.hide();
            } else {
                errorEmailMessage.show();
            }

            // 都道府県
            const stateInput = $("#state").val().trim();
            const errorStateMessage = $("#errorState");
            if (stateInput.length > 0) {
                errorStateMessage.hide();
            } else {
                errorStateMessage.show();
            }

            // 住所
            const cityInput = $("#city").val().trim();
            const errorCityMessage = $("#errorCity");
            if (cityInput.length > 0) {
                errorCityMessage.hide();
            } else {
                errorCityMessage.show();
            }

            // 町域・丁目番地
            const line1Input = $("#line1").val().trim();
            const errorLine1Message = $("#errorLine1");
            if (line1Input.length > 0) {
                errorLine1Message.hide();
            } else {
                errorLine1Message.show();
            }

            // 店舗
            const gymInput = $("#gym").val().trim();
            const errorGymMessage = $("#errorGym");
            if (gymInput.length > 0) {
                errorGymMessage.hide();
            } else {
                errorGymMessage.show();
            }

            // 開始日
            const dateInput = $("#date").val().trim();
            const errorDateMessage = $("#errorDate");
            if (isValidDate(dateInput)) {
                errorDateMessage.hide();
            } else {
                errorDateMessage.show();
            }

            // プラン
            const planInput = $("#selected_plan").val().trim();
            const errorPlanMessage = $("#errorPlan");
            if (planInput.length > 0) {
                errorPlanMessage.hide();
            } else {
                errorPlanMessage.show();
            }

            // カード名義
            const holderNameInput = $("#holderName").val().trim();
            const errorHolderNameMessage = $("#errorHolderName");
            if (holderNameInput.length > 0) {
                errorHolderNameMessage.hide();
            } else {
                errorHolderNameMessage.show();
            }

            // 利用契約
            const errorTermsMessage = $("#errorTerms");
            if (terms_check_flag) {
                errorTermsMessage.hide();
            } else {
                errorTermsMessage.show();
            }

            // エラーがある場合は処理を中止
            if (
                !isValidCardNumber(cardNumberInput) ||
                !isValidExpireDate(cardExpiredValue) ||
                !isValidSecurityCode(securityCodeInput) ||
                !isValidPostCode(postCodeInput) ||
                !isValidEmail(emailInput) ||
                !isValidDate(dateInput) ||
                planInput.length == 0 ||
                terms_check_flag == false
            ) {
                $(".submit-button").prop('disabled', false);
                return;
            }

            Multipayment.init('<?php echo $shopId; ?>');
            Multipayment.getToken({
                cardno: cardNumberInput,
                expire: cardExpiredValue,
                securitycode: securityCodeInput,
                holdername: holderNameInput,
                tokennumber: "1",
            }, (result) => {
                // 処理結果コードが'000'以外の時はエラーのためダイアログを表示する
                if (result.resultCode != "000") {
                    errorCardMessage.show();

                    $(".submit-button").prop('disabled', false);
                } else {
                    $("#token").val(result.tokenObject.token);

                    $(".submit-button").prop('disabled', false);
                    // フォームのactionを設定して送信
                    let actionUrl = $(".submit-button").data('action');
                    $(this).attr('action', actionUrl);
                    $(this)[0].submit();
                }
            });
        });

        function isValidCardNumber(number) {
            if (!/^\d{12,19}$/.test(number)) {
                return false;
            }

            return true;
        }

        function isValidExpireDate(expire) {
            // 4桁の数字形式か確認
            if (!/^\d{4}$/.test(expire)) {
                return false;
            }

            const year = parseInt(expire.substring(0, 2), 10); // 年
            const month = parseInt(expire.substring(2, 4), 10); // 月

            // 年の範囲チェック (2025年から2099年までを仮定)
            if (year < 25 || year > 99) {
                return false;
            }

            // 月の範囲チェック (1〜12)
            if (month < 1 || month > 12) {
                return false;
            }

            // 今日の日付と比較して有効期限をチェック
            const today = new Date();
            const currentYear = today.getFullYear();
            const yearTwoDigits = currentYear % 100;
            const currentMonth = today.getMonth() + 1; // 月は0から始まるため+1

            // 有効期限が過去でないことを確認
            if (year < yearTwoDigits || (year === yearTwoDigits && month < currentMonth)) {
                return false;
            }

            return true;
        }

        function isValidSecurityCode(securityCode) {
            // 3桁または4桁の数字のみを許可
            return /^\d{3,4}$/.test(securityCode) && securityCode !== null;
        }

        function isValidPostCode(postCode) {
            if (/[^0-9\-]/.test(postCode) || postCode == null) {
                return false;
            }
            if (!/^\d{3}-\d{4}$/.test(postCode)) {
                return false;
            }

            return true;
        }

        function isValidEmail(email) {
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(email) || email == null) {
                return false;
            }
            return true;
        }

        function isValidDate(date) {
            const datePattern = /^\d{4}-\d{1,2}-\d{1,2}$/;
            if (target == 'tab1' && (!datePattern.test(date) || date == null)) {
                return false;
            }

            // 入力された日付をDateオブジェクトに変換
            const inputDate = new Date(date);
            inputDate.setHours(0, 0, 0, 0);
            // 今日の日付を取得
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            // 2ヶ月後の日付を計算
            const twoMonthsLater = new Date(today);
            twoMonthsLater.setMonth(today.getMonth() + 2); // 2ヶ月後の日付を設定
            twoMonthsLater.setHours(0, 0, 0, 0);

            console.log(inputDate, today, twoMonthsLater);

            // 明日の日付と比較
            if (target == 'tab1' && (inputDate <= today || inputDate > twoMonthsLater)) {
                console.log(inputDate + " <= " + today);
                return false;
            }

            return true;
        }

        // Enterキーを押したときの処理
        $("input").keydown(function(e) {
            if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
                return false;
            } else {
                return true;
            }
        });

        // 食事サポートの相互排他チェック関数を外に移動
        function checkMealSupportExclusion() {
            const mealSupportBoxes = $(".option-box").filter(function() {
                const optionName = $(this).find("input[name='option']").val();
                return optionName === "食事サポート2週間" || optionName === "食事サポート4週間";
            });
            
            let hasActiveMealSupport = false;
            let activeMealSupportBox = null;
            
            mealSupportBoxes.each(function() {
                const quantity = parseInt($(this).find(".action span:not(.btn)").text());
                const optionName = $(this).find("input[name='option']").val();
                
                if (quantity > 0) {
                    if (hasActiveMealSupport) {
                        console.log("Disabling meal support:", optionName);
                        // 既に他の食事サポートが選択されている場合は無効化
                        $(this).find(".action span:not(.btn)").text("0");
                        $(this).find(".plus, .minus").prop("disabled", true);
                        // option_quantitiesも更新
                        option_quantities[optionName] = 0;
                    } else {
                        hasActiveMealSupport = true;
                        activeMealSupportBox = $(this);
                        console.log("Active meal support:", optionName);
                    }
                }
            });
            
            // 選択されていない食事サポートのボタンを有効化
            mealSupportBoxes.not(activeMealSupportBox).each(function() {
                $(this).find(".plus, .minus").prop("disabled", false);
            });
            
            // 金額を再計算
            updateOptionPriceWithQuantity();
            calculatePrice();
        }

    });
})(jQuery);




  // ここまで＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        });
    })(jQuery);
    </script>
</body>

</html>