<?php
require '../../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable('../../../');
$dotenv->load();

$shopId = $_ENV['SHOP_ID'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>【WITH】クレジットカードフォーム｜ AppleGYM（アップルジム）</title>
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
        <header class="header with">
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

        <div class="contents contact-page with">
            <div class="fv">
                <div class="inner">
                    <h1>クレジットカードフォーム</h1>
                </div>
            </div>
            <!-- ./fv -->
            <div class="form-area card-form">
                <div class="inner">
                    <div class="tab-wrap with-tab">
                        <button class="tab-btn active link-over" data-target="tab1">
                            ご入会手続き
                        </button>
                        <button class="tab-btn link-over" data-target="tab2">
                            会員の方
                        </button>
                    </div>
                    <form action="../../card-form.php" method="post" name="formName" id="form">
                        <div class="input-area">
                            <div class="headline">
                                お名前
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="name" id="name" value="" placeholder="山田林檎" required />
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                メールアドレス
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="email" name="email" id="email" value="" placeholder="×××@×××.com"
                                    required />
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
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                郵便番号
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="postCode" id="postCode" value="" placeholder="123-4567"
                                    required />
                                <p id="errorPostCode" class="error-message">郵便番号が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                市区町村
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="city" id="city" value="" placeholder="市区町村" required />
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                町域・丁目番地
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="line1" id="line1" value="" placeholder="町域・丁目番地" required />
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
                                    <span><b>¥4,500</b>（税込4,950）</span>
                                </label>
                                <input id="M20" class="plan-radio" type="radio" name="plan" value="M20">
                                <label for="M20" class="plan-label link-over">
                                    <span class="plan-name">M20</span>
                                    <span><b>¥9,000</b>（税込9,900）</span>
                                </label>
                                <input id="L20" class="plan-radio" type="radio" name="plan" value="L20">
                                <label for="L20" class="plan-label link-over">
                                    <span class="plan-name">L20</span>
                                    <span><b>¥13,500</b>（税込14,850）</span>
                                </label>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                開始日
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input id="date" type="date" name="start_date" value="">
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                ご購入されるオプション
                            </div>
                            <div class="input">
                                <input id="option1" class="option-checkbox" type="checkbox" name="option" value="プロテイン">
                                <label for="option1" class="option-label">
                                    <span class="option-name">プロテイン</span>
                                    <span class="option-price">
                                        <b>@450</b>
                                        税込495
                                    </span>
                                </label>
                                <input id="option2" class="option-checkbox" type="checkbox" name="option"
                                    value="シューズお預かり">
                                <label for="option2" class="option-label">
                                    <span class="option-name">シューズお預かり</span>
                                    <span class="option-price">
                                        <b>900/月</b>
                                        税込990
                                    </span>
                                </label>
                                <input id="option5" class="option-checkbox" type="checkbox" name="option" value="水">
                                <label for="option5" class="option-label">
                                    <span class="option-name">水</span>
                                    <span class="option-price">
                                        <b>@100</b>
                                        税込110
                                    </span>
                                </label>
                                <input id="option3" class="option-checkbox" type="checkbox" name="option"
                                    value="食事サポート2週間" data-group="food-support">
                                <label for="option3" class="option-label">
                                    <span class="option-name">食事サポート2週間</span>
                                    <span class="option-price">
                                        <b>10,000</b>
                                        税込11,000
                                    </span>
                                </label>
                                <input id="option4" class="option-checkbox" type="checkbox" name="option"
                                    value="食事サポート4週間" data-group="food-support">
                                <label for="option4" class="option-label">
                                    <span class="option-name">食事サポート4週間</span>
                                    <span class="option-price">
                                        <b>18,000</b>
                                        税込19,800
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                カード番号
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="cardNo" id="cardNo" value="" placeholder="1234 5678 9012 3456"
                                    maxlength="19" required />
                                <p id="errorCard" class="error-message">カード番号が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                有効期限 (年月)
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="expire" id="expire" value="" placeholder="例）2025 06"
                                    maxlength="6" required />
                                <p id="errorExpire" class="error-message">有効期限が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                セキュリティコード
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="securityCode" id="securityCode" value="" placeholder="例）123"
                                    maxlength="4" required />
                                <p id="errorSecurityCode" class="error-message">セキュリティコードが無効です。</p>
                            </div>
                        </div>
                        <div class="input-area">
                            <div class="headline">
                                カード名義人
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input type="text" name="holderName" id="holderName" value=""
                                    placeholder="例）TARO YAMADA" required />
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
                                    <li>合計</li>
                                    <li><span class="exclude-tax">0</span> × 10% = <span class="include-tax">0</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="detail">
                                <ul class="list">
                                    <li>初回支払い</li>
                                    <li><span id="first">0</span></li>
                                </ul>
                                <ul class="list">
                                    <li>次月以降支払い</li>
                                    <li><span id="next">0</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-btn">
                            <button type="submit" id="submit-button" class="link-over" disabled>決済する</button>
                        </div>

                        <input type="hidden" name="first_price" id="first_price" value="" />
                        <input type="hidden" name="subscription_price" id="subscription_price" value="" />
                        <input type="hidden" name="campaign_discount" id="campaign_discount" value="" />
                        <input type="hidden" name="selected_plan" id="selected_plan" value="" />
                        <input type="hidden" name="selected_option" id="selected_option" value="" />
                        <input type="hidden" name="selected_date" id="selected_date" value="" />
                        <input type="hidden" name="equipment" id="equipment" value="" />
                        <input type="hidden" name="token" id="token" value="" />
                    </form>
                </div>
            </div>
            <div class="fixed-bar">
                <div class="inner">
                    <p class="ttl">合計</p>
                    <p class="price">
                        <b>¥0</b>
                        （税込 <span>0</span>）
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
            const tax_rate = 1.1; // 消費税

            let today_contents = $("#date");
            let selected_rate = 2; // 選択した日付の金額算出率
            let selected_value = null; // 選択した日付の値

            const equipment_price = 0; // 共用設備費
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

            // 日付設定
            function dateFormat(today, format) {
                format = format.replace("YYYY", today.getFullYear());
                format = format.replace("MM", ("0" + (today.getMonth() + 1)).slice(-2));
                format = format.replace("DD", ("0" + today.getDate()).slice(-2));
                return format;
            }
            const date = dateFormat(new Date(), 'YYYY-MM-DD');
            today_contents.attr('min', date);

            function getDay(date_value) {
                // 選択している日付の取得
                if (date_value) { // 選択している場合
                    selected_value = parseInt(String(date_value).split("-")[2], 10);
                    if (selected_value >= 1 && selected_value <= 15) {
                        selected_rate = 2;
                        $(".period").text("2");
                    } else {
                        selected_rate = 1.5;
                        $(".period").text("1.5");
                    }
                } else {
                    selected_rate = 2;
                    $(".period").text("2");
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
                total_price = first_price + subscription_price;
                total_price_contents.text(total_price);

                return total_price;
            }

            // 合計金額算出
            function makeIncludeTotalPrice() {
                total_tax_price = Math.round((first_price + subscription_price) * tax_rate);
                total_tax_price_contents.text(total_tax_price);

                return total_tax_price;
            }

            // 初月算出（税別）
            function makeFirstPeriodPrice() {
                // $("#first_price").val(first_price);
                first_price = ((plan_price + equipment_price) * (
                        selected_rate - 1)) + first_option_price +
                    food_option_price + admission_fee - admission_fee_discount_price -
                    first_plan_discount_price;

                return first_price;
            }
            // 初月算出（税込）
            function makeFirstPeriodTaxPrice() {
                const first_amount = $("#first_price");
                first_tax_price = Math.round(first_price * tax_rate);
                first_price_contents.text(first_tax_price);
                first_amount.val(first_tax_price);

                return first_tax_price;
            }

            // 2ヶ月目以降算出（税別）
            function makeSubscriptionPeriodPrice() {
                subscription_price = (plan_price - subscription_plan_discount_price) + equipment_price +
                    subscription_option_price;

                return subscription_price;
            }
            // 2ヶ月目以降算出（税込）
            function makeSubscriptionPeriodTaxPrice() {
                const subsctiption_amount = $("#subscription_price");
                subscription_tax_price = Math.round(subscription_price * tax_rate);
                subscription_price_contents.text(subscription_tax_price);
                subsctiption_amount.val(subscription_tax_price);

                return subscription_tax_price;
            }

            // 共用設備費
            function updateEquipmentPrice() {
                const equipment_cost = $(".buy-contents .amount .equipment");

                equipment_cost.empty(); // 一度クリア

                let equipment_cost_price = 0; // 再計算

                // // 初月換算
                // first_price = makeFirstPeriodPrice();
                // // 2ヶ月目以降換算
                // subscription_price = makeSubscriptionPeriodPrice();

                // equipment_cost.append(
                //     `<ul>
                //         <li>共用設備費 <span class="period">${selected_rate}</span>ヶ月</li>
                //         <li>${equipment_cost_price}</li>
                //     </ul>`
                // );
            }

            // プラン計算
            function updatePlanPrice(plan_data) {
                const selected_plan = $(".buy-contents .amount .plan");

                selected_plan.empty(); // 一度クリア

                let plan_name = plan_data.name;
                plan_price = plan_data.price;
                plan_times = plan_data.times;
                let plan_total_price = Math.round(plan_price * selected_rate); // 再計算

                selected_plan.append(
                    `<ul>
                        <li>${plan_name}プラン <span class="period">${selected_rate}</span>ヶ月</li>
                        <li>${plan_price} ×<span class="period">${selected_rate}</span> = ${plan_total_price}</li>
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

                buy_count = (plan_times * (selected_rate - 1)) +
                    plan_times; // 初月含む回数オプションの購入数

                selectedOptions.forEach(option => { // 回数オプション
                    if (option.type === 1) {
                        times_option_price += option.price * buy_count;

                        first_option_price += option.price * (plan_times * (
                            selected_rate - 1));
                        subscription_option_price += option.price * plan_times;

                        selected_option.append(
                            `<ul><li>${option.name}</li><li>${option.price} × ${buy_count} = ${option.price * buy_count}</li></ul>`
                        );

                    } else if (option.type === 2) { // 月オプション
                        first_option_price += option.price * (selected_rate -
                            1);
                        subscription_option_price += option.price;

                        period_option_price += option.price * selected_rate;

                        selected_option.append(
                            `<ul><li>${option.name}</li><li>${option.price} × ${selected_rate} = ${option.price * selected_rate}</li></ul>`
                        );
                    } else if (option.type === 3) { // 食事サポートオプション
                        food_option_price += option.price;

                        selected_option.append(
                            `<ul><li>${option.name}</li><li>${option.price}</li></ul>`
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
                    if (campaign.type === 1) { // プラン割引

                        first_plan_discount_price = (plan_price * (selected_rate - 1)) * campaign
                            .discount;
                        subscription_plan_discount_price = plan_price * campaign.discount;

                        selected_coupon.append(
                            `<ul><li>${campaign.description}</li><li><b>- ${first_plan_discount_price + subscription_plan_discount_price}</b></li></ul>`
                        );

                    } else if (campaign.type === 2) { // 入会金割引

                        if (target == 'tab1') {
                            admission_fee_discount_price = campaign.discount;

                            selected_coupon.append(
                                `<ul><li>${campaign.description}</li><li><b>- ${admission_fee_discount_price}</b></li></ul>`
                            );
                        }

                    } else {}
                });
            }

            // 入会金計算
            function updateAdmissionPrice() {
                const selected_admission = $(".buy-contents .amount .admission");
                selected_admission.empty(); // 一度クリア

                if (target == 'tab1') {
                    admission_fee = 10000;

                } else if (target == 'tab2') {
                    admission_fee = 0;
                }
                selected_admission.append(
                    `<ul>
                        <li>入会金</li>
                        <li>${admission_fee}</li>
                    </ul>`
                );
            }

            // タブ切り替え
            $(".tab-btn").on("click", function() {
                $(".tab-btn").removeClass("active");
                $(this).addClass("active");

                // 表示するタブのIDを取得
                target = $(this).data("target");

                // 対応するタブの表示切り替え
                $(".tab-panel").removeClass("active");
                $("#" + target).addClass("active");

                updateAdmissionPrice(); // 入会金再計算

                // 選択されているクーポンを取得
                get_coupon_field = $("#campaign_discount")
                    .val(); // クーポンデータ
                if (get_coupon_field) {
                    let get_coupon_data = JSON.parse(
                        get_coupon_field); // クーポンデータを取得
                    updateCouponPrice(get_coupon_data); // クーポン再計算
                }

                calculatePrice(); // 金額計算
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
            });

            // 日付
            $("#date").on("change", function() {
                // 選択している日付の取得
                let date_value = today_contents.val();
                selected_rate = getDay(date_value);

                // 選択されているプランを取得
                get_plan_field = $("#selected_plan")
                    .val(); // クーポンデータ
                if (get_plan_field) {
                    let get_plan_data = JSON.parse(get_plan_field); // プランデータを取得
                    updatePlanPrice(get_plan_data); // プラン再計算
                }

                // 選択されているクーポンを取得
                get_coupon_field = $("#campaign_discount")
                    .val(); // クーポンデータ
                if (get_coupon_field) {
                    let get_coupon_data = JSON.parse(
                        get_coupon_field); // クーポンデータを取得
                    updateCouponPrice(get_coupon_data); // クーポン再計算
                }

                $(".option-checkbox").trigger("change");

                $("#selected_date").val(date_value);

                // 金額計算
                calculatePrice();
            });

            // プラン
            $(".plan-radio").on("change", function() {
                const plan = $(this).val();
                const plan_field = $("#selected_plan");
                const selected_plan = $(".buy-contents .amount .plan");

                const options = $("#selected_option").val();

                selected_rate = getDay(selected_value);

                if (plan !== "") {
                    $.ajax({
                        url: "../../../check_form.php",
                        type: "POST",
                        data: {
                            with_plan_data: plan
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
                            option_data2: optionName
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

            $("#name, #email, #postCode, #state, #city, #line1, #cardNo, #expire, #securityCode, #holderName, .plan-radio,  #date")
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
                    const dateValue = $("#selected_date").val().trim();
                    const isSelected = planValue !== "" && dateValue !== "";

                    const allFieldsFilled = Object.values(values).every((value) => value.trim() !== "");
                    $("#submit-button").prop("disabled", !(allFieldsFilled && isSelected));
                });

            $("#form").on("submit", function(event) {
                // エラーチェック
                event.preventDefault();

                const cardNumberInput = $("#cardNo").val().replace(/\s+/g, "");
                const errorCardMessage = $("#errorCard");
                if (isValidCardNumber(cardNumberInput)) {
                    errorCardMessage.hide();
                } else {
                    errorCardMessage.show();
                }

                const expireInput = $("#expire").val().trim();
                const errorExpireMessage = $("#errorExpire");
                if (isValidExpireDate(expireInput)) {
                    errorExpireMessage.hide();
                } else {
                    errorExpireMessage.show();
                }

                const securityCodeInput = $("#securityCode").val().trim();
                const errorSecurityMessage = $("#errorSecurityCode");
                if (isValidSecurityCode(securityCodeInput)) {
                    errorSecurityMessage.hide();
                } else {
                    errorSecurityMessage.show();
                }

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

                const holderNameInput = $("#holderName").val().trim();

                Multipayment.init('<?php echo $shopId; ?>');
                Multipayment.getToken({
                    cardno: cardNumberInput,
                    expire: expireInput,
                    securitycode: securityCodeInput,
                    holdername: holderNameInput,
                    tokennumber: "1",
                }, (result) => {
                    // 処理結果コードが'000'以外の時はエラーのためダイアログを表示する
                    if (result.resultCode != "000") {
                        alert("購入処理中にエラーが発生しました");
                    } else {
                        $("#token").val(result.tokenObject.token);

                        event.target.submit();
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
                // 6桁の数字形式か確認
                if (!/^\d{6}$/.test(expire)) {
                    return false;
                }

                const year = parseInt(expire.substring(0, 4), 10); // 年
                const month = parseInt(expire.substring(4, 6), 10); // 月

                // 年の範囲チェック (2020年から2099年までを仮定)
                if (year < 2020 || year > 2099) {
                    return false;
                }

                // 月の範囲チェック (1〜12)
                if (month < 1 || month > 12) {
                    return false;
                }

                // 今日の日付と比較して有効期限をチェック
                const today = new Date();
                const currentYear = today.getFullYear();
                const currentMonth = today.getMonth() + 1; // 月は0から始まるため+1

                // 有効期限が過去でないことを確認
                if (year < currentYear || (year === currentYear && month < currentMonth)) {
                    return false;
                }

                return true;
            }

            function isValidSecurityCode(securityCode) {
                // 3桁または4桁の数字のみを許可
                return /^\d{3,4}$/.test(securityCode);
            }

            function isValidPostCode(postCode) {
                if (/[^0-9\-]/.test(postCode)) {
                    return false;
                } else {
                    return true;
                }
            }
        });
    })(jQuery);
    </script>
</body>

</html>