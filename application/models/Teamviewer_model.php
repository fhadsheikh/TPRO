<?php

class Teamviewer_model extends CI_Model{
    
    public function createSession($groupid, $description, $company, $email, $waitingMessage){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://webapi.teamviewer.com/api/v1/sessions",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_VERBOSE => true,
          CURLOPT_SSL_VERIFYPEER => false,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"groupid\" : \"$groupid\",\r\n\"description\" : \"$description\",\r\n\"end_customer\" : { \"name\" : \"$company\", \"email\" : \"$email\" },\r\n\"waiting_message\" : \"$waitingMessage\"\r\n}\r\n",
          CURLOPT_HTTPHEADER => array(
            "authorization: Bearer 1152623-0s2uJmDu0ktewizouwpZ",
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return json_decode($response);
        }
        
    }
    
}