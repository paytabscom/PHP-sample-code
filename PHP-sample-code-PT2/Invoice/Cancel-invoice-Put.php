<?php
require_once '../Paytabs-plugin.php';
$plugin = new paytabs();

$invoice_id = 331651;
$request_method = 'PUT';
$request_url = 'payment/invoice/' . $invoice_id . '/cancel';
$data = [];

$page = $plugin->send_api_request($request_url, $data, $request_method);
print_r('the request result is');
print_r('<br>');
print_r($page);

exit();
