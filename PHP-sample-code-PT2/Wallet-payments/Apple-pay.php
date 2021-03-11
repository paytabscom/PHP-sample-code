<?php
require_once '../Paytabs-plugin.php';
$plugin = new Paytabs();

$request_url = 'payment/request';
$data = [
    "tran_type" => "sale",
    "tran_class" => "ecom",
    "cart_id" => "cart_11111",
    "cart_currency" => "EGP",
    "cart_amount" => 1000,
    "cart_description" => "Description of the items/services",
    "paypage_lang" => "en",
    "callback" => "https://webhook.site/ebe60b53-4158-4d82-aa16-231f2823378d",
    "return" => "http://localhost/default/checkresponse.php",
    "customer_details" => [
        "name" => "first last",
        "email" => "email@domain.com",
        "phone" => "0522222222",
        "street1" => "address street",
        "city" => "dubai",
        "state" => "du",
        "country" => "AE",
        "zip" => "12345"
    ],
    "apple_pay_token" => [   //configuration from your Apple Developer Account
        "paymentMethod" => [
            "network" => "Visa",
            "type" => "Debit",
            "displayName" => "Visa 4228"
        ],
        "transactionIdentifier" => "D32A2C43FCC4314A668FFDB95B0F38D0BEF0B2F6AC8569CC433607BA51D25301",
        "paymentData" => [
            "data" => "P\/l0iLnWAj393LZyMjdblyJHo8zUrAv2i73tcSnFkLDCFkuk35oh5+CCA7G6rBFXD0O6iu3kS3cE+yW3uhS88vI7jqMMG4bnJ0GdJUckJ6P7o++IurHG0bIHhOlu8gqL\/1Bd73sHAKp4eK8GRQ0muRQGPwpTUf82J6mvntA\/QhQ3b4Bd2ycn0N5T31XA8okVdNi++8TBuFgflz+61arcrtd7cIQ2lHmqOSk65qV\/EdxpOGAzEjnexgk640cvvfp0rufusssFsgNeW\/0sWniqWqmF64XeA3W2W6rlFThtYOjivbkjeB5fpZaa+fVYKehOF9v4z0\/XENOmVzLFVUqS\/Ba2NKeuMeBt3uporjg4o7rWaguCubz73qYkxSs+KxULy9b+yn692RvarmlNiE92dQ6XIAX1ASUAtMktYNU9nPg=",
            "signature" => "MIAGCSqGSIb3DQEHAqCAMIACAQExDzANBglghkgBZQMEAgEFADCABgkqhkiG9w0BBwEAAKCAMIID5jCCA4ugAwIBAgIIaGD2mdnMpw8wCgYIKoZIzj0EAwIwejEuMCwGA1UEAwwlQXBwbGUgQXBwbGljYXRpb24gSW50ZWdyYXRpb24gQ0EgLSBHMzEmMCQGA1UECwwdQXBwbGUgQ2VydGlmaWNhdGlvbiBBdXRob3JpdHkxEzARBgNVBAoMCkFwcGxlIEluYy4xCzAJBgNVBAYTAlVTMB4XDTE2MDYwMzE4MTY0MFoXDTIxMDYwMjE4MTY0MFowYjEoMCYGA1UEAwwfZWNjLXNtcC1icm9rZXItc2lnbl9VQzQtU0FOREJPWDEUMBIGA1UECwwLaU9TIFN5c3RlbXMxEzARBgNVBAoMCkFwcGxlIEluYy4xCzAJBgNVBAYTAlVTMFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEgjD9q8Oc914gLFDZm0US5jfiqQHdbLPgsc1LUmeY+M9OvegaJajCHkwz3c6OKpbC9q+hkwNFxOh6RCbOlRsSlaOCAhEwggINMEUGCCsGAQUFBwEBBDkwNzA1BggrBgEFBQcwAYYpaHR0cDovL29jc3AuYXBwbGUuY29tL29jc3AwNC1hcHBsZWFpY2EzMDIwHQYDVR0OBBYEFAIkMAua7u1GMZekplopnkJxghxFMAwGA1UdEwEB\/wQCMAAwHwYDVR0jBBgwFoAUI\/JJxE+T5O8n5sT2KGw\/orv9LkswggEdBgNVHSAEggEUMIIBEDCCAQwGCSqGSIb3Y2QFATCB\/jCBwwYIKwYBBQUHAgIwgbYMgbNSZWxpYW5jZSBvbiB0aGlzIGNlcnRpZmljYXRlIGJ5IGFueSBwYXJ0eSBhc3N1bWVzIGFjY2VwdGFuY2Ugb2YgdGhlIHRoZW4gYXBwbGljYWJsZSBzdGFuZGFyZCB0ZXJtcyBhbmQgY29uZGl0aW9ucyBvZiB1c2UsIGNlcnRpZmljYXRlIHBvbGljeSBhbmQgY2VydGlmaWNhdGlvbiBwcmFjdGljZSBzdGF0ZW1lbnRzLjA2BggrBgEFBQcCARYqaHR0cDovL3d3dy5hcHBsZS5jb20vY2VydGlmaWNhdGVhdXRob3JpdHkvMDQGA1UdHwQtMCswKaAnoCWGI2h0dHA6Ly9jcmwuYXBwbGUuY29tL2FwcGxlYWljYTMuY3JsMA4GA1UdDwEB\/wQEAwIHgDAPBgkqhkiG92NkBh0EAgUAMAoGCCqGSM49BAMCA0kAMEYCIQDaHGOui+X2T44R6GVpN7m2nEcr6T6sMjOhZ5NuSo1egwIhAL1a+\/hp88DKJ0sv3eT3FxWcs71xmbLKD\/QJ3mWagrJNMIIC7jCCAnWgAwIBAgIISW0vvzqY2pcwCgYIKoZIzj0EAwIwZzEbMBkGA1UEAwwSQXBwbGUgUm9vdCBDQSAtIEczMSYwJAYDVQQLDB1BcHBsZSBDZXJ0aWZpY2F0aW9uIEF1dGhvcml0eTETMBEGA1UECgwKQXBwbGUgSW5jLjELMAkGA1UEBhMCVVMwHhcNMTQwNTA2MjM0NjMwWhcNMjkwNTA2MjM0NjMwWjB6MS4wLAYDVQQDDCVBcHBsZSBBcHBsaWNhdGlvbiBJbnRlZ3JhdGlvbiBDQSAtIEczMSYwJAYDVQQLDB1BcHBsZSBDZXJ0aWZpY2F0aW9uIEF1dGhvcml0eTETMBEGA1UECgwKQXBwbGUgSW5jLjELMAkGA1UEBhMCVVMwWTATBgcqhkjOPQIBBggqhkjOPQMBBwNCAATwFxGEGddkhdUaXiWBB3bogKLv3nuuTeCN\/EuT4TNW1WZbNa4i0Jd2DSJOe7oI\/XYXzojLdrtmcL7I6CmE\/1RFo4H3MIH0MEYGCCsGAQUFBwEBBDowODA2BggrBgEFBQcwAYYqaHR0cDovL29jc3AuYXBwbGUuY29tL29jc3AwNC1hcHBsZXJvb3RjYWczMB0GA1UdDgQWBBQj8knET5Pk7yfmxPYobD+iu\/0uSzAPBgNVHRMBAf8EBTADAQH\/MB8GA1UdIwQYMBaAFLuw3qFYM4iapIqZ3r6966\/ayySrMDcGA1UdHwQwMC4wLKAqoCiGJmh0dHA6Ly9jcmwuYXBwbGUuY29tL2FwcGxlcm9vdGNhZzMuY3JsMA4GA1UdDwEB\/wQEAwIBBjAQBgoqhkiG92NkBgIOBAIFADAKBggqhkjOPQQDAgNnADBkAjA6z3KDURaZsYb7NcNWymK\/9Bft2Q91TaKOvvGcgV5Ct4n4mPebWZ+Y1UENj53pwv4CMDIt1UQhsKMFd2xd8zg7kGf9F3wsIW2WT8ZyaYISb1T4en0bmcubCYkhYQaZDwmSHQAAMYIBjDCCAYgCAQEwgYYwejEuMCwGA1UEAwwlQXBwbGUgQXBwbGljYXRpb24gSW50ZWdyYXRpb24gQ0EgLSBHMzEmMCQGA1UECwwdQXBwbGUgQ2VydGlmaWNhdGlvbiBBdXRob3JpdHkxEzARBgNVBAoMCkFwcGxlIEluYy4xCzAJBgNVBAYTAlVTAghoYPaZ2cynDzANBglghkgBZQMEAgEFAKCBlTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0yMDA2MTYwOTQ5MDlaMCoGCSqGSIb3DQEJNDEdMBswDQYJYIZIAWUDBAIBBQChCgYIKoZIzj0EAwIwLwYJKoZIhvcNAQkEMSIEILdZb7ICrNx5ZgvQt3OlTdlF57svjNEbx7YslS+w4DPyMAoGCCqGSM49BAMCBEcwRQIgZFY0mdI63DwtrciRA3xRWPCL+QD2KXPWPUC8b2azEKkCIQCb90ECiwGTt4TOm194OCo9wusSNlZipzmy1XBPohv8sAAAAAAAAA==",
            "header" => [
                "publicKeyHash" => "dQ1T3uh4uMRK7OAynypjLF7V9NWdL49JVKIHU+jDsww=",
                "ephemeralPublicKey" => "MFkwEwYHKoZIzj0CAQYIKoZIzj0DAQcDQgAEcPy\/H\/285E6ruf9Y4Yn3D41MdtLFRqdGVPoXr6wWpWk\/cBr31AZSVWCorIu4HT92GNy5efMcinrAyev2Mwy+zg==",
                "transactionId" => "d32a2c43fcc4314a668ffdb95b0f38d0bef0b2f6ac8569cc433607ba51d25301"
            ],
            "version" => "EC_v1"
        ]
    ]
];
$page = $plugin->send_api_request($request_url, $data);
header('Location:' . $page['redirect_url']); /* Redirect browser */
exit();
