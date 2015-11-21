<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DASHBOARD CONTROLLER
| -------------------------------------------------------------------
| This page is session protected. If no valid session is found,
| user will be redirected to the 'User/Login' controller.
|
*/

class Dashboard extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        $this->load->model('Database_model');        
        // If user is not logged in, redirect to 'User/Login' controller
        ($this->tech->isLoggedIn() ? : redirect('user/login') );
        
    }
    
    public function index(){
        
        $data['pageTitle'] = 'Dashboard';
        
        // Load Dashboard views
        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('dashboard', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');
        
    }
    
    public function getYearlydTickets(){
        echo "[
          [ new Date(2012, 3, 13), 37032 ],
          [ new Date(2012, 3, 14), 38024 ],
          [ new Date(2012, 3, 15), 38024 ],
          [ new Date(2012, 3, 16), 38108 ],
          [ new Date(2012, 3, 17), 38229 ]        
        ]";
    }
    public function getYearlyTickets(){
        
        $day1 = "2013-01-01";
        echo "[";
        for($i = 0; $i <= 363; $i++){
            
            $date = date("Y-m-d", strtotime($day1."+$i days"));
            $tickets[$date][] = $this->Database_model->getTicketsCount($date, $date);
            
            
            echo "[ new Date(".date("Y, m, d", strtotime($date))."), ".$tickets[$date][0][0]['COUNT(*)']." ],<br>";
           
    
            
            
        }
        
        echo "[ new Date(2014, 12, 31), 0 ]]";
        
         //echo "<pre>"; print_r($final); echo "</pre>";
  }
    
}