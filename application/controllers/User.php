<?php //Housekeeping complete

defined('BASEPATH') OR exit('No direct script access allowed');

/* Default Controller
 *
 * Used for Technicians only
 * User must have an active account in JitBit Helpdesk
 */

class User extends CI_Controller {

    /* Constructor for User Controller */

    public function __construct(){

        /* Load parent contructor as requirement of Codeigniter */

        parent::__construct();

        /* Load Dependencies */

        /* Helpers */

        /* Date Helper:
         * For general date formatting functions
         */

        $this->load->helper('date_helper');

        /* Libraries */

        /* Auth Library
         * For authentication logic
         */

        $this->load->library('auth');
        
        /* Prepare Library
         * Prepare data for view requirements
         */
        
        $this->load->library('prepare');

        /* Models */

        /* Database Model
         * Connected to dedicated database
         */

        $this->load->model('Database_model');

        /* Gravatar Model
         * Connected to Gravatar API
         */

        $this->load->model('Gravatar_model');

        /* Geo Model
         * Connected to Geo API to resolve location from IP
         */

        $this->load->model('Geo_model');

    }

    /* Login Method
     * Serves login form to unauthenticated users
     *
     * @access public
     */

    public function login(){

        /* If user is already logged in, redirect them to their profile */

        if($this->auth->is_logged_in() === TRUE)
        {
            redirect('user/profile/'.$this->session->UserID);
        }

        /* Vars to pass to views */

        $data['pageTitle'] = 'Login'; // Page title

        /* Load Views */

        $this->load->view('html_header',$data); // Header
        $this->load->view('login'); // Login Form
        $this->load->view('html_footer'); // Footer

    }

    /* Authenticate Method
     * Login form submits to this method
     *
     * @access public
     */

    public function authenticate(){

        /* Get Username and Password properties */

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        /* Authenticate username and password */

        if($this->auth->authenticate($username, $password) === FALSE)
        {
            /* If authentication failed, redirect back to login page */

            /* Set $error var to error returned from auth */

            $error = $this->auth->error;

            /* Redirect user back to login page */

            redirect('user/login/'.$error);
            
        }
        
        /* Redirect to profile */

        redirect('user/profile'.$this->session->UserID);
            
        

    }

    /* Logout Method
     * Destroy session and redirect
     *
     * @access public
     */

    public function logout(){

        /* Log out user */

        $this->auth->logout();

        /* Redirect usr back to login page */
        
        redirect('user/login');

    }
    
     /* profile method
     *
     * @access public
     * @param int $userID - JitBit Helpdesk ID
     */
    
    public function profile($userID){
        
        /* Check if user is logged in, otherwise redirect to Login */
        
        if($this->auth->is_logged_in() !== TRUE)
        {
            
            redirect('user/login/');
            
        }
        
        /* Activity Feed */
        
        /* Get notifications for feed from DB */
        $comments = $this->Database_model->getComments($userID);
        
        /* Prepare notifications for view */
        $data['comments'] = $this->prepare->notifications($comments);
        
        /* Mentions Feed */
        
        /* Get notifications for feed from DB */
        
        $mentions = $this->Database_model->getMentions($userID);
        
        /* Prepare notifications for view */
        
        $data['mentions'] = $this->prepare->notifications($mentions);
        
        /* Get Geo Location of user */
        
        $data['geoLocation'] = $this->Geo_model->getLocation($this->session->IPAddress);
        
        /* get logged in user from DB */
        
        $data['user'] = $this->Database_model->getUser($userID);
        
        /* Gravatar */

        $data['gravatar'] = $this->Gravatar_model->getGravatar($data['user'][0]->email);
        
        /* Friends List */

        $data['users'] = $this->Database_model->getTechs();
        
        /* Get gravatar for all friends */
        
        foreach($users as $user)
        {
            $$data['users']->Gravatar = $this->Gravatar_model->getGravatar($data['users']->email);
        }

        /* Load Views */
        
        $this->load->view('html_header', $data);
        
        $this->load->view('headerbar');
        
        $this->load->view('profile', $data);
        
        $this->load->view('infobar');
        
        $this->load->view('html_footer');

    }


    
    /* getNotifications method
     * Endpoint for Ajax request
     * Return notifications for loggedin user
     *
     * @access public
     * @param int $userID - JitBit Helpdesk ID
     */

    public function getNotifications($userID){
        
        /* Check if user is logged in */
        
        if($this->auth->is_logged_in() === FALSE)
        {
            
            /* Redirect user to login page */
            
            $error = "unauthorized";
            redirect('user/login/'.$error);
            
        }
        
        /* Get Notifications from Database */
        
        $notifications = $this->Database_model->getMentions($userID);

        /* Prepare notifications for ajax return */
        
        $final_notifications = $this->prepare->notifications($notifications);
        
        /* Return json object of return notifications array */

        echo json_encode(array_reverse($final_notifications));

    }
    
}

   