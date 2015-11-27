<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  User CONTROLLER
| -------------------------------------------------------------------
*/

class User extends CI_Controller {
    
    // Controller for all User related pages and functions
    
    public function __construct(){
        
        parent::__construct();
        
        $this->load->model('Database_model');
        $this->load->model('Gravatar_model');
        
    }
        
    public function login(){
        
        $data['pageTitle'] = 'Login';
        
        //Load views for login page
        $this->load->view('html_header',$data);
        $this->load->view('login');
        $this->load->view('html_footer');
        
    }
    
    public function authenticate(){
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->tech->authenticate($username, $password);
        
        $this->load->model('Gravatar_model');
        $this->session->set_userdata('gravatar', $this->Gravatar_model->getGravatar($this->session->Email));
        
        $this->load->config('pusher');
        $this->session->set_userdata('pusher_api_key', $this->config->item('pusher_api_key'));
        
        redirect('dashboard');
        
    }
    
    public function getNotifications($userID){
        
        $notifications = $this->Database_model->getNotifications($userID);
        
        
        
        foreach($notifications as $key => $notification){
            
            
            if($notification->FirstName == null){
                $notifications[$key]->Name = $notification->UserName;
            } else {
                $notifications[$key]->Name = $notification->FirstName." ".$notification->LastName;
            }
            
            
            if($notification->Body == 'New ticket submitted <b>(email)</b>'){
                $notifications[$key]->Message = 'created a new ticket (#'.$notification->IssueID.')';
            } else {
                $notifications[$key]->Message = $notification->Body;
            }
            
            $notifications[$key]->Gravatar = $this->Gravatar_model->getGravatar($notification->Email);
        }
        echo json_encode($notifications);
  
        //echo "<pre>"; print_r($notifications); echo "</pre>";
        
    }
    
    public function logout(){
        
        // Functional method, does not display a view. Simply redirects after destroying the session
        
        $this->tech->logout();
        
        // Redirect to login page after logging out
        redirect('user/login');

    }
    
}