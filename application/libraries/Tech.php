<?php

class Tech {
    
    protected $CI;
    
    public function __construct(){
        
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
        $this->CI->load->model('helpdesk_model');
        
    }
    
    public function isLoggedIn(){
        
        // If user is not logged in, redirect to 'User/Login' controller
        if($this->CI->session->userdata('LoggedIn')){ return true; } else { return false; };
        
    }
    
    public function authenticate($username, $password){
        
        $this->CI->session->set_userdata("credentials", base64_encode($username.":".$password));
        if($this->CI->helpdesk_model->authenticate()){ 
            $this->CI->session->set_userdata('LoggedIn', 'true'); 
        };

    }
    
    public function logout(){
        
        $this->CI->session->sess_destroy();
        
    }
    
    
}