<?php
require_once '../Paytabs-plugin.php';
$plugin = new Paytabs();

$request_url = 'payment/request';
$data = [
    "tran_type" => "sale",
    "tran_class" => "ecom",
    "cart_id" => "cart_11111",
    "cart_currency" => "EGP",
    "cart_amount" => 1000,
    "cart_description" => "Description of the items/services",
    "paypage_lang" => "en",
    "callback" => "https://webhook.site/ebe60b53-4158-4d82-aa16-231f2823378d",
    "return" => "http://localhost/default/checkresponse.php",
    "customer_details" => [
        "name" => "first last",
        "email" => "email@domain.com",
        "phone" => "0522222222",
        "street1" => "address street",
        "city" => "dubai",
        "state" => "du",
        "country" => "AE",
        "zip" => "12345"
    ],
    "samsung_pay_token" => [ //configuration from your Samsung Developer Account
        "3DS" => [
            "data" => "eyJhbGciOiJSU0ExXzUiLCJraWQiOiI5ZXlTR0doYTdOd1h5MUZ2ZlR1dU9ZRUt0TjRTNFBYa0xtL2hBOFJDTTBvPSIsInR5cCI6IkpPU0UiLCJjaGFubmVsU2VjdXJpdHlDb250ZXh0IjoiUlNBX1BLSSIsImVuYyI6IkExMjhHQ00ifQ.MavQXDz3LOEiD-I9hyUQE_F_SBSMpwkhp7-MU0SAqMrY77cK7asGqtnySJsm6az7IQp1X4DspSKp3Yn6Dq_1xEaNTtsrEvUri3mL3MX9sOHq3nbJl-M1Wuo25ITSu4kal9Da8Dr-o9U11AhxF8vwfvnosX7D5tR8eNdAzsPi5BdcaB4QQpTFQvWESH48QlTmWmX8HfJLhnin2JH2J0YBiM8yi2h8i_ZOTapeVrjA37ig7VGmf4YnE5CmQZrZBHazYGHr-nzGhIQUyUkYbCvQRUr43k2fYNXbnQb1ARtBXe1jK_e0kxwBQz5TMRaa0RsYJGTlyTsQJrP0T78F3jpMmg.95JMDZbXPv9LFZe3.HuhBARXSZ9RLHEjv4eloQwgNTI9a_kknrrmlXZS1jQljLAj7p3GZVTr3lFhpx0Z3-FXBslVA306yGrj_JcTJjpTwudOE2XVadaSarMpFHiMXHa_fcheqGDS60BeksvHWZmoV51I4WbYLB7tjD_SfAO7Ic0u78OW4BD2AnHEsauWuTwxAZ-g7ma4XRfgO2kWAHuuNdTxY_NtzYLoUix4mH02h6q3ARZ7Za331qGVCLsk90t6-ytJcWpV_._mNeyiwfoSvP84cGzq7PEQ",
            "type" => "S",
            "version" => "100"
        ],
        "payment_card_brand" => "VI",
        "payment_currency_type" => "USD",
        "payment_eco_opt_in" => "false",
        "payment_last4_dpan" => "0832",
        "payment_last4_fpan" => "9039",
        "merchant_ref" => "",
        "method" => "3DS",
        "recurring_payment" => false,
        "payment_shipping_address" => [
            "shipping" => [],
            "email" => ""
        ],
        "payment_shipping_method" => ""
    ]
];
$page = $plugin->send_api_request($request_url, $data);
header('Location:' . $page['redirect_url']); /* Redirect browser */
exit();
