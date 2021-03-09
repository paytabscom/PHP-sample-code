<?php
require_once '../Paytabs-plugin.php';
$plugin = new Paytabs();

$request_url = 'payment/request';
$data = [
    "tran_type" => "void",
    "tran_class" => "ecom",
    "cart_id" => "cart_66666",
    "cart_currency" => "EGP",
    "cart_amount" => 130,
    "cart_description" => "shopping Cart",
    "tran_ref" => "TST2105400086891" //the Auth tran_ref you want to Void it
];
$page = $plugin->send_api_request($request_url, $data);
print_r($page);
exit();
