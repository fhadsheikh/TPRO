<?php // Under housekeeping

defined('BASEPATH') OR exit('No direct script access allowed');

/* Dashboard Controller
 *
 * Each user has a customizable dashboard
 */

class Dashboard extends CI_Controller {
    
    /* Constructor for Dashboard Controller */
    
    public function __construct(){
        
        /* Load parent constructor as requirement of Codeigniter */
        
        parent::__construct();
        
        /* Load Dependencies */
        
        /* Models */
        
        /* Database Model
         * Connected to dedicated database 
         */
        
        $this->load->model('Database_model');      
        
        /* Check if user is logged in, otherwise redirect to Login */
        
        if($this->auth->is_logged_in() !== TRUE)
        {
            
            redirect('user/login');
            
        }
        
        
    }
    
    /* Index method 
     *
     * @access public
     * @return view
     */
    
    public function index(){
        
        /* View var for page title */
        
        $data['pageTitle'] = 'Dashboard';
        
        /* Load Views */
        
        $this->load->view('html_header', $data);
        
        $this->load->view('headerbar');
        
        $this->load->view('dashboard', $data);
        
        $this->load->view('infobar');
        
        $this->load->view('html_footer');
        
    }
    
}