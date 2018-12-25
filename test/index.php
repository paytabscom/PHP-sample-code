<?php

/*
 * Trying to create a pay page
 */

require_once 'paytabs.php';

$pt = new paytabs("test@paytabs.com", "nNqPdDtMxoj6ZxHOcqvejQk2v3YFlTNIGeyUS1Gpq0vqxdeJDKYXAiZ6lYLGRzpyNXsFZ95q9AQHO5rrPpoqIow4niLeRbNF8gk8");


//$result = $pt->authentication();

$result = $pt->create_pay_page(array(
    //Customer's Personal Information
    'merchant_email' => "test@paytabs.com",
	'secret_key' => "nNqPdDtMxoj6ZxHOcqvejQk2v3YFlTNIGeyUS1Gpq0vqxdeJDKYXAiZ6lYLGRzpyNXsFZ95q9AQHO5rrPpoqIow4niLeRbNF8gk8",
    'cc_first_name' => "john",          //This will be prefilled as Credit Card First Name
    'cc_last_name' => "Doe",            //This will be prefilled as Credit Card Last Name
    'cc_phone_number' => "00973",
    'phone_number' => "33333333",
    'email' => "customer@gmail.com",
    
    //Customer's Billing Address (All fields are mandatory)
    //When the country is selected as USA or CANADA, the state field should contain a String of 2 characters containing the ISO state code otherwise the payments may be rejected. 
    //For other countries, the state can be a string of up to 32 characters.
    'billing_address' => "manama bahrain",
    'city' => "manama",
    'state' => "manama",
    'postal_code' => "00973",
    'country' => "BHR",
    
    //Customer's Shipping Address (All fields are mandatory)
    'address_shipping' => "Juffair bahrain",
    'city_shipping' => "manama",
    'state_shipping' => "manama",
    'postal_code_shipping' => "00973",
    'country_shipping' => "BHR",
   
   //Product Information
    "products_per_title" => "Product1 || Product 2 || Product 4",   //Product title of the product. If multiple products then add “||” separator
    'quantity' => "1 || 1 || 1",                                    //Quantity of products. If multiple products then add “||” separator
    'unit_price' => "2 || 2 || 6",                                  //Unit price of the product. If multiple products then add “||” separator.
    "other_charges" => "91.00",                                     //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
    
    'amount' => "101.00",                                          //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
    'discount'=>"1",                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount
    'currency' => "USD",                                            //Currency of the amount stated. 3 character ISO currency code 
   

    
    //Invoice Information
    'title' => "John Doe",               // Customer's Name on the invoice
    "msg_lang" => "en",                 //Language of the PayPage to be created. Invalid or blank entries will default to English.(Englsh/Arabic)
    "reference_no" => "1231231",        //Invoice reference number in your system
   
    
    //Website Information
    "site_url" => "http://www.vatable.com",      //The requesting website be exactly the same as the website/URL associated with your PayTabs Merchant Account
    'return_url' => "http://localhost/expressv2/successredirect.php",
    "cms_with_version" => "API USING PHP",

    "paypage_info" => "1"
));

echo "FOLLOWING IS THE RESPONSE: <br />";
print_r ($result);
// echo '<script type="text/javascript">
//            window.location = "'.$result->payment_url.'"
//       </script>';
// $_SESSION['paytabs_api_key'] = $result->secret_key;

?>