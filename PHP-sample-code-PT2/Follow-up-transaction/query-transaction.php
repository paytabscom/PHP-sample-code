<?php
require_once '../Paytabs-plugin.php';
$plugin = new Paytabs();

$request_url = 'payment/query';
$data = [
    "tran_ref" => "TST2104800080101"
];
$page = $plugin->send_api_request($request_url, $data);
print_r($page);
exit();
