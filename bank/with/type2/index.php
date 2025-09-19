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
    <title>【WITH】口座振替フォーム｜ AppleGYM（アップルジム）</title>
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
                    <h1>口座振替フォーム</h1>
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
                    <form action="../../bank-form.php" method="post" id="form">
                        <div class="input-area">
                            <div class="headline">
                                金融機関コード
                                <span class="req">必須</span>
                            </div>
                            <div class="input">
                                <select name="bankCode" id="bankCode" required>
                                    <option value="">選択してください</option>
                                    <option value="0001">みずほ銀行</option>
                                    <option value="0005">三菱UFJ銀行</option>
                                    <option value="0009">三井住友銀行</option>
                                    <option value="0010">りそな銀行</option>
                                    <option value="0017">埼玉りそな銀行</option>
                                    <option value="0033">PayPay銀行</option>
                                    <option value="0034">セブン銀行</option>
                                    <option value="0035">ソニー銀行</option>
                                    <option value="0036">楽天銀行</option>
                                    <option value="0038">住信 SBI ネット銀行</option>
                                    <option value="0039">au じぶん銀行</option>
                                    <option value="0040">イオン銀行</option>
                                    <option value="0116">北海道銀行</option>
                                    <option value="0117">青森銀行</option>
                                    <option value="0118">みちのく銀行</option>
                                    <option value="0119">秋田銀行</option>
                                    <option value="0120">北都銀行</option>
                                    <option value="0121">荘内銀行</option>
                                    <option value="0122">山形銀行</option>
                                    <option value="0123">岩手銀行</option>
                                    <option value="0124">東北銀行</option>
                                    <option value="0125">七十七銀行</option>
                                    <option value="0126">東邦銀行</option>
                                    <option value="0128">群馬銀行</option>
                                    <option value="0129">足利銀行</option>
                                    <option value="0130">常陽銀行</option>
                                    <option value="0131">筑波銀行</option>
                                    <option value="0133">武蔵野銀行</option>
                                    <option value="0134">千葉銀行</option>
                                    <option value="0135">千葉興業銀行</option>
                                    <option value="0138">横浜銀行</option>
                                    <option value="0140">第四北越銀行</option>
                                    <option value="0142">山梨中央銀行</option>
                                    <option value="0143">八十二銀行</option>
                                    <option value="0144">北陸銀行</option>
                                    <option value="0145">富山銀行</option>
                                    <option value="0146">北國銀行</option>
                                    <option value="0147">福井銀行</option>
                                    <option value="0149">静岡銀行</option>
                                    <option value="0150">スルガ銀行</option>
                                    <option value="0151">清水銀行</option>
                                    <option value="0152">大垣共立銀行</option>
                                    <option value="0153">十六銀行</option>
                                    <option value="0154">三十三銀行</option>
                                    <option value="0155">百五銀行</option>
                                    <option value="0157">滋賀銀行</option>
                                    <option value="0158">京都銀行</option>
                                    <option value="0159">関西みらい銀行</option>
                                    <option value="0161">池田泉州銀行</option>
                                    <option value="0162">南都銀行</option>
                                    <option value="0163">紀陽銀行</option>
                                    <option value="0164">但馬銀行</option>
                                    <option value="0166">鳥取銀行</option>
                                    <option value="0167">山陰合同銀行</option>
                                    <option value="0168">中国銀行</option>
                                    <option value="0169">広島銀行</option>
                                    <option value="0170">山口銀行</option>
                                    <option value="0172">阿波銀行</option>
                                    <option value="0173">百十四銀行</option>
                                    <option value="0174">伊予銀行</option>
                                    <option value="0175">四国銀行</option>
                                    <option value="0177">福岡銀行</option>
                                    <option value="0178">筑邦銀行</option>
                                    <option value="0179">佐賀銀行</option>
                                    <option value="0181">十八親和銀行</option>
                                    <option value="0182">肥後銀行</option>
                                    <option value="0183">大分銀行</option>
                                    <option value="0184">宮崎銀行</option>
                                    <option value="0185">鹿児島銀行</option>
                                    <option value="0187">琉球銀行</option>
                                    <option value="0188">沖縄銀行</option>
                                    <option value="0190">西日本シティ銀行</option>
                                    <option value="0191">北九州銀行</option>
                                    <option value="0397">SBI新生銀行</option>
                                    <option value="0501">北洋銀行</option>
                                    <option value="0509">北日本銀行</option>
                                    <option value="0512">仙台銀行</option>
                                    <option value="0514">大東銀行</option>
                                    <option value="0517">栃木銀行</option>
                                    <option value="0522">京葉銀行</option>
                                    <option value="0532">大光銀行</option>
                                    <option value="0533">長野銀行</option>
                                    <option value="0537">福邦銀行</option>
                                    <option value="0538">静岡中央銀行</option>
                                    <option value="0542">愛知銀行</option>
                                    <option value="0544">中京銀行</option>
                                    <option value="0562">みなと銀行</option>
                                    <option value="0566">トマト銀行</option>
                                    <option value="0569">もみじ銀行</option>
                                    <option value="0572">徳島大正銀行</option>
                                    <option value="0573">香川銀行</option>
                                    <option value="0576">愛媛銀行</option>
                                    <option value="0578">高知銀行</option>
                                    <option value="0587">熊本銀行</option>
                                    <option value="0591">宮崎太陽銀行</option>
                                    <option value="0526">東京スター銀行</option>
                                    <option value="0530">神奈川銀行</option>
                                    <option value="0582">福岡中央銀行</option>
                                    <option value="0583">佐賀共栄銀行</option>
                                    <option value="0585">長崎銀行</option>
                                    <option value="0590">豊和銀行</option>
                                    <option value="0594">南日本銀行</option>
                                    <option value="0596">沖縄海邦銀行</option>
                                    <option value="0398">あおぞら銀行</option>
                                    <option value="0525">東日本銀行</option>
                                    <option value="1000">信用金庫</option>
                                    <option value="9900">ゆうちょ銀行</option>
                                    <option value="0137">きらぼし銀行</option>
                                    <option value="0508">きらやか銀行</option>
                                    <option value="0513">福島銀行</option>
                                    <option value="0516">東和銀行</option>
                                    <option value="0543">名古屋銀行</option>
                                    <option value="0534">富山第一銀行</option>
                                    <option value="0310">GMO あおぞらネット銀行</option>
                                    <option value="0570">西京銀行</option>
                                    <option value="0565">島根銀行</option>
                                    <option value="2951">北海道労働金庫</option>
                                    <option value="2954">東北労働金庫</option>
                                    <option value="2963">中央労働金庫</option>
                                    <option value="2965">新潟県労働金庫</option>
                                    <option value="2966">長野県労働金庫</option>
                                    <option value="2968">静岡県労働金庫</option>
                                    <option value="2970">北陸労働金庫</option>
                                    <option value="2972">東海労働金庫</option>
                                    <option value="2978">近畿労働金庫</option>
                                    <option value="2984">中国労働金庫</option>
                                    <option value="2987">四国労働金庫</option>
                                    <option value="2990">九州労働金庫</option>
                                    <option value="2997">沖縄県労働金庫</option>
                                    <option value="2011">北央信用組合</option>
                                    <option value="2013">札幌中央信用組合</option>
                                    <option value="2030">青森県信用組合</option>
                                    <option value="2060">あすか信用組合</option>
                                    <option value="2061">石巻商工信用組合</option>
                                    <option value="2062">古川信用組合</option>
                                    <option value="2063">仙北信用組合</option>
                                    <option value="2075">秋田県信用組合</option>
                                    <option value="2084">山形中央信用組合</option>
                                    <option value="2085">山形第一信用組合</option>
                                    <option value="2090">福島県商工信用組合</option>
                                    <option value="2092">いわき信用組合</option>
                                    <option value="2095">相双五城信用組合</option>
                                    <option value="2096">会津商工信用組合</option>
                                    <option value="2101">茨城県信用組合</option>
                                    <option value="2122">真岡信用組合</option>
                                    <option value="2125">那須信用組合</option>
                                    <option value="2143">あかぎ信用組合</option>
                                    <option value="2146">群馬県信用組合</option>
                                    <option value="2149">ぐんまみらい信用組合</option>
                                    <option value="2165">熊谷商工信用組合</option>
                                    <option value="2167">埼玉信用組合</option>
                                    <option value="2180">房総信用組合</option>
                                    <option value="2184">銚子商工信用組合</option>
                                    <option value="2190">君津信用組合</option>
                                    <option value="2202">全東栄信用組合</option>
                                    <option value="2229">江東信用組合</option>
                                    <option value="2231">青和信用組合</option>
                                    <option value="2235">中ノ郷信用組合</option>
                                    <option value="2241">共立信用組合</option>
                                    <option value="2243">七島信用組合</option>
                                    <option value="2248">大東京信用組合</option>
                                    <option value="2254">第一勧業信用組合</option>
                                    <option value="2271">警視庁職員信用組合</option>
                                    <option value="2274">東京消防信用組合</option>
                                    <option value="2277">ハナ信用組合</option>
                                    <option value="2304">神奈川県医師信用組合</option>
                                    <option value="2305">神奈川県歯科医師信用組合</option>
                                    <option value="2307">信用組合横浜華銀</option>
                                    <option value="2315">小田原第一信用組合</option>
                                    <option value="2318">相愛信用組合</option>
                                    <option value="2351">新潟縣信用組合</option>
                                    <option value="2357">はばたき信用組合</option>
                                    <option value="2360">協栄信用組合</option>
                                    <option value="2362">巻信用組合</option>
                                    <option value="2363">新潟大栄信用組合</option>
                                    <option value="2366">糸魚川信用組合</option>
                                    <option value="2377">山梨県民信用組合</option>
                                    <option value="2378">都留信用組合</option>
                                    <option value="2390">長野県信用組合</option>
                                    <option value="2404">富山県信用組合</option>
                                    <option value="2411">金沢中央信用組合</option>
                                    <option value="2442">信用組合愛知商銀</option>
                                    <option value="2443">愛知県警察信用組合</option>
                                    <option value="2448">豊橋商工信用組合</option>
                                    <option value="2451">愛知県中央信用組合</option>
                                    <option value="2470">岐阜商工信用組合</option>
                                    <option value="2471">イオ信用組合</option>
                                    <option value="2476">飛騨信用組合</option>
                                    <option value="2481">益田信用組合</option>
                                    <option value="2505">滋賀県信用組合</option>
                                    <option value="2526">京滋信用組合</option>
                                    <option value="2540">大同信用組合</option>
                                    <option value="2541">成協信用組合</option>
                                    <option value="2549">のぞみ信用組合</option>
                                    <option value="2560">大阪府医師信用組合</option>
                                    <option value="2566">大阪府警察信用組合</option>
                                    <option value="2567">近畿産業信用組合</option>
                                    <option value="2602">兵庫県警察信用組合</option>
                                    <option value="2605">兵庫県医療信用組合</option>
                                    <option value="2606">兵庫県信用組合</option>
                                    <option value="2610">神戸市職員信用組合</option>
                                    <option value="2616">淡陽信用組合</option>
                                    <option value="2620">兵庫ひまわり信用組合</option>
                                    <option value="2661">島根益田信用組合</option>
                                    <option value="2674">笠岡信用組合</option>
                                    <option value="2680">広島市信用組合</option>
                                    <option value="2681">広島県信用組合</option>
                                    <option value="2690">両備信用組合</option>
                                    <option value="2703">山口県信用組合</option>
                                    <option value="2721">香川県信用組合</option>
                                    <option value="2740">土佐信用組合</option>
                                    <option value="2773">福岡県信用組合</option>
                                    <option value="2803">佐賀東信用組合</option>
                                    <option value="2820">長崎三菱信用組合</option>
                                    <option value="2825">西海みずき信用組合</option>
                                    <option value="2845">熊本県信用組合</option>
                                    <option value="2870">大分県信用組合</option>
                                    <option value="2890">鹿児島興業信用組合</option>
                                    <option value="2895">奄美信用組合</option>
                                </select>
                            </div>
                            <p id="test"></p>
                        </div>
                        <div class="input-area" id="name">
                            <div class="headline">
                                口座名義（漢字）
                            </div>
                            <div class="input">
                                <input type="text" name="accountNameKanji" id="accountNameKanji" value=""
                                    placeholder="山田林檎" required />
                            </div>
                        </div>
                        <div class="input-area" id="kana">
                            <div class="headline">
                                口座名義（カナ）
                            </div>
                            <div class="input">
                                <input type="text" name="accountName" id="accountName" value="" placeholder="ヤマダリンゴ" />
                                <p id="errorAccountName" class="error-message">口座名義（カナ）が無効です。</p>
                            </div>
                        </div>
                        <div class="input-area" id="code">
                            <div class="headline">
                                支店コード
                            </div>
                            <div class="input">
                                <input type="text" name="branchCode" id="branchCode" value="" placeholder="支店コード" />
                                <p id="errorBranchCode" class="error-message">支店コードが無効です。</p>
                            </div>
                        </div>
                        <div class="input-area" id="type">
                            <div class="headline">
                                預金種別
                            </div>
                            <div class="input">
                                <select name="accountType" id="accountType">
                                    <option value="1">普通</option>
                                    <option value="2">当座</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-area" id="number">
                            <div class="headline">
                                口座番号
                            </div>
                            <div class="input">
                                <input type="text" name="accountNumber" id="accountNumber" value=""
                                    placeholder="口座番号" />
                                <p id="errorAccountNumber" class="error-message">口座番号が無効です。</p>
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
                                ※固定費用として、共用設備費 ¥300/月（税込330）がかかります。
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
                            <button type="submit" id="submit-button" class="link-over">登録する</button>
                        </div>

                        <input type="hidden" name="first_price" id="first_price" value="" />
                        <input type="hidden" name="subscription_price" id="subscription_price" value="" />
                        <input type="hidden" name="campaign_discount" id="campaign_discount" value="" />
                        <input type="hidden" name="selected_plan" id="selected_plan" value="" />
                        <input type="hidden" name="selected_option" id="selected_option" value="" />
                        <input type="hidden" name="selected_date" id="selected_date" value="" />
                        <input type="hidden" name="equipment" id="equipment" value="" />
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

            $("#accountNameKanji, #accountName, #bankCode, #branchCode, #accountType, #accountNumber, .plan-radio, #date")
                .on("change", function() {
                    const values = {
                        accountNameKanjiValue: $("#accountNameKanji").val(),
                        accountNameValue: $("#accountName").val(),
                        bankCodeValue: $("#bankCode").val(),
                        branchCodeValue: $("#branchCode").val(),
                        accountTypeValue: $("#accountType").val(),
                        accountNumberValue: $("#accountNumber").val(),
                    };

                    // 選択されているかチェック
                    const planValue = $("#selected_plan").val();
                    const dateValue = $("#selected_date").val();
                    const isSelected = planValue !== "" && dateValue !== "";

                    const allFieldsFilled = Object.values(values).every((value) => value.trim() !== "");
                    $("#submit-button").prop("disabled", (allFieldsFilled && isSelected));

                    const selectedBankCode = values.bankCodeValue;
                    const bankCodesToHide = [
                        "0001", "0005", "0009", "0010", "0017", "0034", "0038", "0159", "0562",
                        "0310"
                    ];
                    $("#code, #kana, #type, #number").css({
                        display: "flex",
                    });
                    if (!bankCodesToHide.includes(selectedBankCode)) {
                        if (selectedBankCode == "0033") {
                            $("#type, #number").css({
                                display: "none",
                            });
                        } else if (selectedBankCode == "0036") {
                            $("#code, #kana, #type, #number").css({
                                display: "none",
                            });
                        } else {
                            $("#code, #type, #number").css({
                                display: "none",
                            });
                        }
                    }

                });

            $("#form").on("submit", function(event) {
                // エラーチェック
                event.preventDefault();

                const accountNameInput = $("#accountName").val().trim();
                const errorAccountName = $("#errorCard");
                if (isValidAccountName(accountNameInput)) {
                    errorAccountName.hide();
                } else {
                    errorAccountName.show();
                }

                const branchCodeInput = $("#branchCode").val();
                const errorBranchCode = $("#errorBranchCode");
                if (isValidBranchCode(branchCodeInput)) {
                    errorBranchCode.hide();
                } else {
                    errorBranchCode.show();
                }

                const accountNumberInput = $("#accountNumber").val();
                const errorAccountNumber = $("#errorAccountNumber");
                if (isValidAccountNumber(accountNumberInput)) {
                    errorAccountNumber.hide();
                } else {
                    errorAccountNumber.show();
                }

                event.target.submit();

            });

            function isValidAccountName(accountName) {
                let regex = /^[Ａ-Ｚ０-９ァ-ンー]+$/;
                if (!regex.test(accountName)) {
                    return false;
                }
                return true;
            }

            function isValidBranchCode(branchCode) {
                let regex = /^\d{3}$/;
                if (branchCode) {
                    if (!regex.test(branchCode)) {
                        return false;
                    }
                }
                return true
            }

            function isValidAccountNumber(accountNumber) {
                let regex = /^\d{7}$/;
                if (accountNumber) {
                    if (!regex.test(accountNumber)) {
                        return false;
                    }
                }
                return true
            }

        });
    })(jQuery);
    </script>
</body>

</html>