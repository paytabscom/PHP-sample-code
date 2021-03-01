<?php
require_once 'paytabs-plugin.php';
$plugin= new paytabs();

session_start();
$transRef = $_SESSION['tran_ref'];

$request_url = 'payment/query';
$data = [
    "tran_ref"=> $transRef,
];
$page = $plugin->Send_api_request($request_url,$data);


print_r('Payment updates');
print_r('<br>');
print_r($page);
session_destroy();
