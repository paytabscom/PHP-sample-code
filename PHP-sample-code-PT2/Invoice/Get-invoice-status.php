<?php
require_once '../Paytabs-plugin.php';
$plugin = new Paytabs();

$invoice_id = 333003;
$request_method = 'GET';
$request_url = 'payment/invoice/' . $invoice_id . '/status';
$data = [];

$page = $plugin->send_api_request($request_url, $data, $request_method);
print_r('the invoice details is');
print_r('<br>');
print_r($page);

exit();
