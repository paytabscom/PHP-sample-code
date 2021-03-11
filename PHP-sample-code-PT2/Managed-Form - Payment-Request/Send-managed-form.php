<?php
require_once '../Paytabs-plugin.php';
$plugin = new Paytabs();

$base_url = $plugin->getBaseUrl();
$request_url = 'payment/request';
$data = [
    "tran_type" => "sale",
    "tran_class" => "ecom",
    'payment_methods' => ['creditcard'],
    'payment_token' => $_POST['token'],
    "cart_id" => $_POST['cart_id'],
    "cart_currency" => $_POST['currency'],
    "cart_amount" => $_POST['amount'],
    "cart_description" => "managed form sample",
    "paypage_lang" => "en",
    "callback" => "https://webhook.site/730acce0-e54e-4522-8a45-f9b8e44624b6", // Nullable - Must be HTTPS, otherwise no post data from paytabs
    "return" => $base_url."Result.php", // Must be HTTPS, otherwise no post data from paytabs , must be relative to your site URL
    "customer_details" => [
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "phone" => $_POST['phone'],
        "street1" => $_POST['street1'],
        "city" => $_POST['city'],
        "state" => $_POST['state'],
        "country" => $_POST['country'],
        "zip" => $_POST['postcode'],
        "ip" => file_get_contents("https://api.ipify.org")
    ],
    "shipping_details" => [
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "phone" => $_POST['phone'],
        "street1" => $_POST['street1'],
        "city" => $_POST['city'],
        "state" => $_POST['state'],
        "country" => $_POST['country'],
        "zip" => $_POST['postcode']
    ]
];

$page = $plugin->send_api_request($request_url, $data);

if (!empty($page['redirect_url'])) {
    header("Location: {$page['redirect_url']}");
    exit;
}
