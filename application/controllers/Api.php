<?php

class Api extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Helpdesk_model');
        $this->load->model('Teamviewer_model');
    }
    
    public function connectionRequest($ticketID){
        
        $ticket = $this->Helpdesk_model->getTicket($ticketID);
        
        $groupid = "g51514526";
        $description = $ticket->Subject;
        $company = $ticket->SubmitterUserInfo->CompanyName;
        $email = $ticket->SubmitterUserInfo->Email;
        $waitingMessage = "Hi ".$ticket->SubmitterUserInfo->Username.", You have been added to the TeamViewer queue. A technician will be with you shortly.";
        
        $result = $this->Teamviewer_model->createSession($groupid,$description,$company,$email,$waitingMessage);
        
        $clientLink = $result->end_customer_link;
        $techLink = $result->supporter_link;
        
        $body = "Your Teamviewer Credentials (Valid for 24 Hours) \nClient link: ".$clientLink."\nTechnician Link: ".$techLink;
        
        $this->Helpdesk_model->postReply($ticketID, $body);
        
    }
    
}