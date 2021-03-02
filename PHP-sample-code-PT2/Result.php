<?php

$response_data = $_POST;

$transRef = filter_input(INPUT_POST, 'tranRef');

if (!$transRef)
    die('Transaction reference is not set. return url must be HTTPs with POST method to can retrieve data');

print_r('Payment updates');
print_r('<br>');
print_r($response_data);

