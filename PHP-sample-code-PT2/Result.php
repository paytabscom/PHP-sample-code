<?php
require_once 'Paytabs-plugin.php';
$plugin = new Paytabs();

$response_data = $_POST;

$transRef = filter_input(INPUT_POST, 'tranRef');

if (!$transRef)
    die('Transaction reference is not set. return url must be HTTPs with POST method to can retrieve data');

print_r('Payment updates');
print_r('<br>');
print_r($response_data);

//

echo "<h2> Transaction reference: <b>{$transRef}</b> </h2>";


/** Local Verify PayTabs response By signature calculation: Option 1 */

echo "<h3>Local Payment validation</h3>";

$is_valid = $plugin->is_valid_redirect($response_data);

if (!$is_valid) {
    die('Not a valid PayTabs response');
}

//a

$is_success = $response_data['respStatus'] === 'A';
if ($is_success) {
    echo 'Payment succeed <br>';
    print_r($response_data);
} else {
    echo 'Payment failed <br>';
}


/** Verify PayTabs response By sending new  request: Option 2 */

echo "<h3>Remote Payment validation</h3>";

$request_url = 'payment/query';
$data = [
    "tran_ref" => $transRef
];
$verify_result = $plugin->send_api_request($request_url, $data);
$is_success = $verify_result['payment_result']['response_status'] === 'A';
if ($is_success) {
    echo 'Payment succeed <br>';
    print_r($verify_result);
} else {
    echo 'Payment failed <br>';
}



