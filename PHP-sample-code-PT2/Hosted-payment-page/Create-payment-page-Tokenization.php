<?php
require_once '../Paytabs-plugin.php';
$plugin = new Paytabs();

$base_url = $plugin->getBaseUrl();
$request_url = 'payment/request';
$data = [
    "tran_type" => "sale",
    "tran_class" => "ecom",
    "tokenise" => "2",
    "cart_id" => "cart_11111",
    "cart_currency" => "EGP",
    "cart_amount" => 1000,
    "cart_description" => "Description of the items/services",
    "paypage_lang" => "en",
    "show_save_card" => false,
    "callback" => "https://webhook.site/730acce0-e54e-4522-8a45-f9b8e44624b6", // Nullable - Must be HTTPS, otherwise no post data from paytabs
    "return" => $base_url."Result.php", // Must be HTTPS, otherwise no post data from paytabs , must be relative to your site URL
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
    "shipping_details" => [
        "name" => "name1 last1",
        "email" => "email1@domain.com",
        "phone" => "971555555555",
        "street1" => "street2",
        "city" => "dubai",
        "state" => "dubai",
        "country" => "AE",
        "zip" => "54321"
    ]
];

$page = $plugin->send_api_request($request_url, $data);
header('Location:' . $page['redirect_url']); /* Redirect browser */
exit();
