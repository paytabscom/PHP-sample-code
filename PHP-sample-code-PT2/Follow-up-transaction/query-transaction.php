<?php
require_once '../paytabs-plugin.php';
$plugin= new paytabs();

$request_url = 'payment/query';
$data = [
    "tran_ref"=> "TST2104800080101"
];
$page = $plugin->Send_api_request($request_url,$data);
print_r($page);
exit();
