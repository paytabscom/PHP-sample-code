<?php
require_once 'paytabs.php';

$pt = new paytabs("director@vatable.com", "vZ8nRlhEg3vAsEeOWTtmgC4Uh8OAsWiXWqkNMCs2GYD9CSXzLrV130Wl9LWBHezDETrrvUtcS7luZi3KJZMN0I89t5LbjkOYefpK");
$result = $pt->verify_payment($_POST['payment_reference']);
echo "<center><h1>" . $result->result . "</h1></center>";

?>