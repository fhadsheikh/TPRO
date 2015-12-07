<?php

class QA extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
    
        ($this->tech->isLoggedIn() ? : redirect('user/login'));

    }
    
    public function index(){
        
        $data['pageTitle'] = 'Quality Assurance';
        
        // Load Dashboard views
        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('qa', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');
        
    }
    
    public function test(){
        
        $data['pageTitle'] = 'Quality Assurance';
        
        // Load Dashboard views
        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('test', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');
        
    }
    
    public function testcase($id){
        
        $data['pageTitle'] = 'Quality Assurance';
        
        // Load Dashboard views
        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('testcase', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');
        
    }
    
    public function getCase($id){
        
        $this->load->model('Database_model');
        $techs = $this->Database_model->getTechs();
        
        echo json_encode($techs[$id]);
        
    }


}