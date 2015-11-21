<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        
        $this->load->model('Database_model');
        $this->load->model('Helpdesk_model');
        $this->load->helper('date_helper');
 

        $allowed = $this->session->userdata('LoggedIn');

        if($allowed == false){redirect('user/login');}
        
    }
    
    public function index(){
        
        $data['pageTitle'] = 'Reports';
        
        // Load Dashboard views
        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('reports', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');
        
    }
    
    // AJAX HANDLERS
    
    public function getThreeResponses(){
        
        $openTickets = $this->Database_model->getOpen();
        
        
    
        
        foreach($openTickets as $key => $openTicket){
            
            $comments = $this->Helpdesk_model->getComments($openTicket->IssueID);
            
            $x = 0;
            
            foreach($comments as $comment){
                if($comment->UserID == $openTicket->UserID){
                    $x++;
                }
            }
            
            if($x >= 3){            
                $final[$openTicket->IssueID] = $x;
            }
            
            $data[$key][] = $openTicket->IssueID;
            $data[$key][] = $openTicket->Subject;
            $data[$key][] = $openTicket->name;
            $data[$key][] = $openTicket->priority;
            $data[$key][] = $openTicket->UserName;
            $data[$key][] = $x;
            $data[$key][] = $openTicket->Status;
            $data[$key][] = daysFromToday($openTicket->IssueDate)." day(s) ago";
            
        }

        echo json_encode($data);
        
    }
    
}