<?php
require_once '../paytabs-plugin.php';
$plugin= new paytabs();

$request_url = 'payment/token';
$data = [
    "token"=> "2C4651BE67A3EA30C6B791F8618B78B0"
];
$page = $plugin->Send_api_request($request_url,$data);
print_r($page);
exit();
