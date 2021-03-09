<?php
require_once '../Paytabs-plugin.php';
$plugin = new Paytabs();

$request_url = 'token/delete';
$data = [
    "token" => "2C4651BE67A3EA30C6B791F8618B78B0"
];
$page = $plugin->send_api_request($request_url, $data);
print_r($page);
exit();
