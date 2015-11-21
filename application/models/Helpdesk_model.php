<?php

class Helpdesk_model extends CI_Model{
    
    public function authenticate(){
        
        // Connect to helpdesk API to verify if credentials are correct AND if user is a TPRO employee
        
        // Connect to helpdesk API using user's credentials are return json array of authorization method
        $headers = array(); 
        $headers[] = 'Content-Type: application/json';
        $headers[] = "content-length:40";
        $headers[] = 'Authorization: Basic '.$this->session->credentials;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://clockworks.ca/support/helpdesk/api/authorization");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $output = curl_exec($curl); //json output from the api
        curl_close ($curl);

        $json = json_decode($output, true); //Convert json to PHP array
        
        $this->session->set_userdata($json);
        
        // Check if returned user is has CompanyId of 1 which is "TPRO" company
        if($json['CompanyId']== "1"){
            return true;
        } else {
            return false;
        }
        
    }
    
    public function getAllTickets($count, $countper = 100){
        
        $headers = array(); 
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Basic '. base64_encode("fhad:Hotmail1234");
        
        $openTickets = array();
        $i = 0;
        $offset = 0;
        
        while($i < $count){
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "http://clockworks.ca/support/helpdesk/api/tickets?count=$countper&offset=$offset");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $output = curl_exec($curl); //json output from the api
            curl_close ($curl);

            $this->json = json_decode($output, true); //Convert json to PHP array

            $openTickets = array_merge($openTickets,$this->json);
            
            $i = $i + 1;
            $offset = $offset+50;
            
        }
        
        return $openTickets; 
        
    }
    
    public function getTicket($id){
        
        $headers = array();
        $headers[] = 'Content-Type: appplication/json';
        $headers[] = 'Authorization: Basic '. base64_encode("fhad:Hotmail1234");
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://clockworks.ca/support/helpdesk/api/ticket/$id");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        $output = curl_exec($curl);
        curl_close ($curl);
        
        return json_decode($output);
        
    }
    
    public function getComments($id){
        
        $headers = array();
        $headers[] = 'Content-Type: appplication/json';
        $headers[] = 'Authorization: Basic '. base64_encode("fhad:Hotmail1234");
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://clockworks.ca/support/helpdesk/api/comments/$id");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        $output = curl_exec($curl);
        curl_close ($curl);
        
        return json_decode($output);
        
    }
    
    public function postReply($ticketID, $body){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://clockworks.ca/support/helpdesk/api/comment",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"id\"\r\n\r\n$ticketID\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"body\"\r\n\r\n$body\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"forTechsOnly\"\r\n\r\ntrue\r\n-----011000010111000001101001--",
          CURLOPT_HTTPHEADER => array(
            'Authorization: Basic '.$this->session->credentials,
            "cache-control: no-cache",
            "content-type: multipart/form-data; boundary=---011000010111000001101001",
            "postman-token: e5c2ffc8-d725-d644-e468-cfa2c272f21b"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
        
        $this->output->set_status_header(200);
        
    }
    
}