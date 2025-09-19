<?php
require '../../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable('../../');
$dotenv->load();

$shopId = $_ENV['SHOP_ID'];

$formData = $_SESSION['formData'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>【単発決済】クレジットカードフォーム｜ AppleGYM（アップルジム）</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="canonical" href="" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="og:site_name" content="初めてのパーソナルジムApple GYM（アップルジム）" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="【単発決済】クレジットカードフォーム｜ AppleGYM（アップルジム）" />
    <meta property="og:url" content="" />
    <meta property="article:published_time" content="2024-03-07T07:04:57+00:00" />
    <meta property="article:modified_time" content="2024-03-07T07:04:57+00:00" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="【単発決済】クレジットカードフォーム" />

    <link rel="stylesheet" type="text/css" href="../../css/style.css" />
    <meta name="robots" content="noindex" />
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="inner">
                <div class="box">
                    <div class="logo">
                        <a href="#" class="link-over">
                            <img src="../../img/header-logo-img.svg" alt="Apple GYM（アップルジム）のロゴ" width="110"
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
                    <!-- <div class="tab-wrap smart-tab">
                        <button class="tab-btn active link-over" data-target="tab1">
                            ご入会手続き
                        </button>
                        <button class="tab-btn link-over" data-target="tab2">
                            会員の方
                        </button>
                    </div> -->
                    <form method="post" name="formName" id="form">
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
                                    placeholder="1234567" required />
                                <p class="notice">※ハイフン不要</p>
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
                                    <option value="恵比寿東口店">恵比寿東口店</option>
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
                                ご購入される商品
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <input id="change_reservation20" class="plan-radio" type="radio" name="item"
                                    value="直前予約変更料（20分）">
                                <label for="change_reservation20" class="plan-label link-over">
                                    <span class="plan-name">直前予約変更料（20分）</span>
                                    <span><b>¥1,000</b>（税込 ¥1,100）</span>
                                </label>
                                <input id="change_reservation40" class="plan-radio" type="radio" name="item"
                                    value="直前予約変更料（40分）">
                                <label for="change_reservation40" class="plan-label link-over">
                                    <span class="plan-name">直前予約変更料（40分）</span>
                                    <span><b>¥2,000</b>（税込 ¥2,200）</span>
                                </label>
                                <input id="add_ticket20" class="plan-radio" type="radio" name="item" value="追加チケット（20分）">
                                <label for="add_ticket20" class="plan-label link-over">
                                    <span class="plan-name">追加チケット（20分）</span>
                                    <span><b>¥2,250</b>（税込 ¥2,475）</span>
                                </label>
                                <input id="add_ticket40" class="plan-radio" type="radio" name="item" value="追加チケット（40分）">
                                <label for="add_ticket40" class="plan-label link-over">
                                    <span class="plan-name">追加チケット（40分）</span>
                                    <span><b>¥4,500</b>（税込 ¥4,950）</span>
                                </label>
                                <p id="errorItem" class="error-message">商品を選択してください。</p>
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

                        <div class="buy-contents">
                            <h2>ご購入内容</h2>
                            <div class="amount">
                                <div class="item"></div>
                            </div>
                        </div>

                        <div class="total-price">
                            <div class="sum-price">
                                <ul class="list">
                                    <li>合計</li>
                                    <li><span class="exclude-tax">¥0</span> × 10% = <span class="include-tax">¥0</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-btn">
                            <div class="tab-panel active">
                                <button data-action="../card-onetime.php" class="link-over submit-button">決済する</button>
                            </div>
                            <!-- <div class="tab-panel tab2-panel">
                                <button data-action="../../card-register.php"
                                    class="link-over submit-button">登録する</button>
                            </div> -->
                        </div>

                        <input type="hidden" name="first_price" id="first_price" value="" />
                        <!-- 合計金額 -->
                        <input type="hidden" name="total_amount_price" id="total_amount_price" value="" />
                        <!-- ./合計金額 -->
                        <input type="hidden" name="selected_item" id="selected_item" value="" />
                        <input type="hidden" name="token" id="token" value="" />
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
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script>
    (function($) {
        $(function() {
            const tax_rate = 1.1; // 消費税

            let item_price = 0; // 商品金額
            let times_option_price = 0; // オプション金額（回数オプション）

            let buy_contents = $(".buy-contents .amount");

            let first_price = 0; // 初月支払い（税別）
            let first_tax_price = 0; // 初月支払い（税込）
            let first_price_contents = $(".total-price #first");

            let total_price = 0; // 合計金額（税別）
            let total_price_contents = $(".total-price .exclude-tax, .fixed-bar .price b");
            let total_tax_price = 0; // 合計金額（税込）
            let total_tax_price_contents = $(".total-price .include-tax, .fixed-bar .price span");

            let get_item_field = $("#selected_item").val(); // 商品データ

            let total_amount_price = $("#total_amount_price"); // 合計金額

            let cardExpiredValue = null; // カードの有効期限

            // 計算処理
            function calculatePrice() {
                makeFirstPeriodPrice(); // 初月算出（税別）
                makeFirstPeriodTaxPrice(); // 初月算出（税込）
                makeExcludeTotalPrice(); // 税別合計金額算出
                makeIncludeTotalPrice(); // 合計金額算出
            }

            // 税別合計金額算出
            function makeExcludeTotalPrice() {
                total_price = first_price;
                total_price_contents.text("¥" + total_price.toLocaleString());

                return total_price;
            }

            // 合計金額算出
            function makeIncludeTotalPrice() {
                total_tax_price = Math.round(total_price * tax_rate);
                total_tax_price_contents.text("¥" + total_tax_price.toLocaleString());

                total_amount_price.val(total_tax_price); // 合計金額

                return total_tax_price;
            }

            // 初月算出（税別）
            function makeFirstPeriodPrice() {
                first_price = item_price;

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

            // 商品計算
            function updateItemPrice(item_data) {
                const selected_item = $(".buy-contents .amount .item");

                selected_item.empty(); // 一度クリア

                let item_name = item_data.name;
                item_price = item_data.price;

                selected_item.append(
                    `<ul>
                        <li>${item_name}</li>
                        <li>¥${item_price.toLocaleString()}</li>
                    </ul>`
                );
            }

            // プラン
            $(".plan-radio").on("change", function() {
                const item = $(this).val();
                const item_field = $("#selected_item");
                const selected_item = $(".buy-contents .amount .item");

                if (item !== "") {
                    $.ajax({
                        url: "../../check_form.php",
                        type: "POST",
                        data: {
                            item_data: item
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response) {
                                item_field.val(JSON.stringify(response)); // 商品情報を保存
                                updateItemPrice(response); // 再計算

                                // 金額計算
                                calculatePrice();
                            } else {
                                selected_item.empty();
                                item_field.val("");
                            }
                        },
                        error: function() {
                            alert("通信エラーが発生しました。");
                        }
                    });
                }
            });

            $("#name, #email, #postCode, #state, #city, #line1, #cardNo, #expire, #securityCode, #holderName, .plan-radio")
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

                    // カードの有効期限
                    const expiredValue = $("#expire").val();
                    if (expiredValue.length === 4) {
                        const front = expiredValue.substring(0, 2);
                        const back = expiredValue.substring(2);
                        cardExpiredValue = back + front;
                    }
                });

            $('.submit-button').on("click", function(event) {
                event.preventDefault(); // デフォルト動作を防ぐ

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

                // 商品
                const itemInput = $("#selected_item").val().trim();
                const errorItemMessage = $("#errorItem");
                if (itemInput.length > 0) {
                    errorItemMessage.hide();
                } else {
                    errorItemMessage.show();
                }

                // カード名義 追加
                const holderNameInput = $("#holderName").val().trim();
                const errorHolderNameMessage = $("#errorHolderName");
                if (isValidHolderName(holderNameInput)) {
                    errorHolderNameMessage.hide();
                } else {
                    errorHolderNameMessage.show();
                }

                // エラーがある場合は処理を中止
                if (
                    !isValidCardNumber(cardNumberInput) ||
                    !isValidExpireDate(cardExpiredValue) ||
                    !isValidSecurityCode(securityCodeInput) ||
                    !isValidPostCode(postCodeInput) ||
                    !isValidEmail(emailInput) ||
                    !isValidHolderName(holderNameInput) // 追加
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
                if (!/^\d{7}$/.test(postCode)) {
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

            // 追加
            function isValidHolderName(holderName) {
                const pattern = /^[a-zA-Z0-9\s]+$/;

                if (!pattern.test(holderName) || holderName == null) {
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

        });
    })(jQuery);
    </script>
</body>

</html>