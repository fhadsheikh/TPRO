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
        
        redirect('dashboard');
        
    }
    
    public function logout(){
        
        // Functional method, does not display a view. Simply redirects after destroying the session
        
        $this->tech->logout();
        
        // Redirect to login page after logging out
        redirect('user/login');

    }
    
}