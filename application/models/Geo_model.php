<?php

class Geo_model extends CI_Model{
    
    public function getLocation($ip){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://freegeoip.net/json/$ip",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: d7a77e2f-4d86-164b-2b8e-9126ce4f67e0"
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