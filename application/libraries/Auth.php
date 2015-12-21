<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {
    
    protected $CI;
    
    public $auth_error;
    
    public function __construct(){
        
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
        $this->CI->load->model('helpdesk_model');
        $this->CI->load->config('pusher');
        $this->CI->load->model('Gravatar_model');
        $this->CI->load->config('pusher');
        $this->CI->load->config('settings');
        
    }
    
    public function is_logged_in(){
        
        // If user is not logged in, redirect to 'User/Login' controller
        if($this->CI->session->userdata('LoggedIn')){ return true; } else { return false; };
        
    }
    
    public function authenticate($username, $password){
        
        $this->CI->session->set_userdata("credentials", base64_encode($username.":".$password));
        if($this->CI->helpdesk_model->authenticate()){ 
            $this->CI->session->set_userdata('LoggedIn', 'true'); 
            $this->CI->session->set_userdata('pusher_api_key', $this->CI->config->item('pusher_api_key'));
            $this->CI->session->set_userdata('gravatar', $this->CI->Gravatar_model->getGravatar($this->CI->session->Email));
            $this->CI->session->set_userdata('modules', $this->CI->config->item('modules'));
        }
        else{
            $this->auth_error = "Authentication_Failed";
        };

    }
    
    public function logout(){
        
        $this->CI->session->sess_destroy();
        
    }
    

    
    
}