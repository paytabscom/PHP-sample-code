<?php


class Paytabs
{
    const   PROFILE_ID = 59305,
        SERVER_KEY = 'S9JN9NTLRW-JBD9GGBBGN-DRLNJBBGTG',
        BASE_URL = 'https://secure-egypt.paytabs.com/';


    function send_api_request($request_url, $data, $request_method = null)
    {
        $data['profile_id'] = $this::PROFILE_ID;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this::BASE_URL . $request_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_CUSTOMREQUEST => isset($request_method) ? $request_method : 'POST',
            CURLOPT_POSTFIELDS => json_encode($data, true),
            CURLOPT_HTTPHEADER => array(
                'authorization:' . $this::SERVER_KEY,
                'Content-Type:application/json'
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $response;
    }

    function getBaseUrl()
    {
        // output: /myproject/index.php
        $currentPath = $_SERVER['PHP_SELF'];

        // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
        $pathInfo = pathinfo($currentPath);

        // output: localhost
        $hostName = $_SERVER['HTTP_HOST'];

        // output: http://
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';

        // output: /myproject/sub folder contains PT2/
        $current_directory = substr(strrchr($pathInfo['dirname'],'/'), 1);
        $parent_directory = substr($pathInfo['dirname'], 0, - strlen($current_directory));

        // return: http://localhost/myproject/
        return $protocol.$hostName.$parent_directory;
    }
}