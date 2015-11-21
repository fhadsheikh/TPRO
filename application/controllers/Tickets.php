<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('date_helper');
        $this->load->model('Helpdesk_model');
        $this->load->model('Database_model');
    }
    
    // PAGES
    
    public function index(){
        
        $data['pageTitle'] = 'Tickets';
        
        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('tickets', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');        
        
    }
    
    public function ticket($id = NULL){
        
        // Dependencies
        $this->load->model('Helpdesk_model');
        $this->load->model('Database_model');
        
        // If ticket argument is not passed in the variable then redirect to tickets page
        if($id === NULL){ redirect('tickets'); }
        
        // Set page title
        $data['pageTitle'] = 'Ticket ID '.$id;
        
        // Get ticket information from helpdesk API
        $data['ticket'] = $this->Helpdesk_model->getTicket($id);
        
        // If ticket was not found then throw 404 error with details
        if($data['ticket'] === NULL){
                    $data['pageTitle'] = 'Ticket ID '.$id.' not found';
                    $data['error'] = "Ticket $id not found";
                    $data['details'] = "Please verify if the ticket exists in the helpdesk and you have permission to view it.";
                    
                    header("HTTP/1.1 404 Not Found");
                    $this->load->view('html_header', $data);
                    $this->load->view('headerbar');
                    $this->load->view('404', $data);
                    $this->load->view('infobar');
                    $this->load->view('html_footer');   
            return;
        } 
        
        // Get ticket comments
        $comments = $this->Helpdesk_model->getComments($id);
        
        // Format comment date
        foreach($comments as $key => $comment){
            $comments[$key]->CommentDate = mysqlDateTimeFirst($comment->CommentDate);}
        
        // Set comments array with formatted date into page variable
        $data['comments'] = $comments;
        
        // Get currently open tickets from User
        $data['currentlyOpen'] = $this->Database_model->getCurrentlyOpen($data['ticket']->SubmitterUserInfo->Username);
        
        // Get count of currently open tickets from User
        $data['currentlyOpenCount'] = count($data['currentlyOpen']);
        
        $data['techdb'] = $this->Database_model->getUser($this->session->UserID);
        
        
        // Load views and pass in page variables
        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('ticket', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');    
        
    }
    
    // AJAX HANDLERS
    
    public function getAllTickets(){
        
        $tickets = $this->Database_model->getOpen();
        
        foreach($tickets as $key => $ticket){
            $data[$key][] = $ticket->IssueID;
            $data[$key][] = '<a href="tickets/ticket/'.$ticket->IssueID.'">'.$ticket->Subject.'</a>';
            $data[$key][] = $ticket->name;
            $data[$key][] = $ticket->priority;
            $data[$key][] = $ticket->UserName;
            $data[$key][] = $ticket->CompanyName;
            if($ticket->Status == 'New'){
                $data[$key][] = "<span class='label label-danger'>".$ticket->Status." </span>";
            } else if($ticket->Status == 'In progress') {
                $data[$key][] = "<span class='label label-success'>".$ticket->Status." </span>";
                
            } else if($ticket->Status == 'Resolved'){
                $data[$key][] = "<span class='label label-default'>".$ticket->Status." </span>";

            } else {
                $data[$key][] = $ticket->Status;
            }
            $data[$key][] = daysFromToday($ticket->IssueDate)." day(s) ago";
        }
        
        echo json_encode($data);
        
    }
    
    public function getCategory($id){
        
            
        $this->load->model('Database_model');
        $tickets = $this->Database_model->getCategory($id);
        
        foreach($tickets as $key => $ticket){
            $data[$key][] = $ticket->IssueID;
            $data[$key][] = $ticket->Subject;
            $data[$key][] = $ticket->name;
            $data[$key][] = $ticket->priority;
            $data[$key][] = $ticket->UserName;
            $data[$key][] = $ticket->CompanyName;
            if($ticket->Status == 'New'){
                $data[$key][] = "<span class='label label-danger'>".$ticket->Status." </span>";
            } else if($ticket->Status == 'In progress') {
                $data[$key][] = "<span class='label label-success'>".$ticket->Status." </span>";
                
            } else if($ticket->Status == 'Resolved'){
                $data[$key][] = "<span class='label label-default'>".$ticket->Status." </span>";

            } else {
                $data[$key][] = $ticket->Status;
            }
            $data[$key][] = daysFromToday($ticket->IssueDate)." day(s) ago";
        }
        
        echo json_encode($data);
        
    }
        
    // POST HANDLERS
    
    public function reply(){

        $ticketID = $this->input->post('ticketID');
        $body = $this->input->post('body');
        
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