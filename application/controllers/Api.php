<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/* API Controller
 *
 * Used for various ajax requests
 */

class Api extends CI_Controller {
    
    /* Constructor for API Controller */
    
    public function __construct(){
        
        /* Load parent constructor as per codeigniter requirement */
        
        parent::__construct();
        
        /* Load Dependencies */
        
        /* Models */
        
        /* Database Model 
         * Connected to dedicated database
         */
        
        $this->load->model('Database_model');
        
        /* HelpDesk Model to connect to JITBIT */
        
        $this->load->model('Helpdesk_model');
        
        /* TeamViewer Model to connect TeamViewer */
        
        $this->load->model('Teamviewer_model');
        
        /* Libraries */
        
        /* Prepare library 
         * Used to prepare data for view requirements 
         */
        
        $this->load->library('prepare');
        
        /* Check if user is logged in, otherwise redirect to Login */
        
        if($this->auth->is_logged_in() !== TRUE)
        {
            
            redirect('user/login');
            
        }
        
    }
    
        
    /* getNotifications method
     * Return notifications for logged-in user
     *
     * @access public
     * @param int $userID - JitBit Helpdesk ID
     * @return notifications in a json object
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
    
    /* getTickets method
     * Return all tickets open and closed tickets within a date range
     * from the bug fix and inquiry categories 
     *
     * Date format for vars must be YYYY/MM/DD
     * 
     * @access public
     * @param string $start - Select tickets newer than this date 
     * @param string $end - Select tickets older than this date
     * @return tickets within desired date range in a json object
     */
    
    public function getTickets($start, $end){
        
        /* Get tickets from DB within date range */
        
        $tickets = $this->Database_model->getTickets($start, $end);
        
        /* Prepare tickets for ajax request */
        
        $final_tickets = $this->prepare->tickets($tickets);
        
        /* Return json object of returned tickets array */
        
        echo json_encode($final_tickets);
        
    }
    
    /* getOpen method
     * Return all currently open tickets in Bug Fix or Inquiry category
     * 
     * @access public
     * @return open tickets in json object
     */
    
    public function getOpen(){
        
        /* Get open tickets from DB */
        
        $tickets = $this->Database_model->getOpen();
        
        /* Prepare tickets for ajax return */
        
        $final_tickets = $this->prepare->tickets($tickets);
        
        /* Return json object of returned tickets array */
        
        echo json_encode($final_tickets);
        
    }
    
    /* getTechs Method
     * Return ticket count for each technician within date range
     * Only checks for tickets in Inquiry and Bug Fix Category
     * 
     * @access public
     * @param string $start - Select tickets newer than this date
     * @param string $end - Select tickets older than this date
     * @return json object
     */
    
    public function getTechStats($start, $end){
        
        /* Get all Techs */
        
        $techs = $this->Database_model->getTechs(true);
        
        /* Get tickets within date range */
        
        $tickets = $this->Database_model->getTickets($start,$end);
        
        /* Prepare Tech Stats for ajax request */
        
        $techStats = $this->prepare->techStats($techs, $tickets);
        
        /* Return json object of returned Tech Stats array */
        
        echo json_encode($techStats);
        
    }
    
    /* getTrainings Method
     * Returns training hours for techs within date range
     *
     * @access public
     * @param string $start - Select training dates newer than this date 
     * @param string $end - Select training dates older than this date 
     */
    
    public function getTrainings($start,$end){}
    
    public function connectionRequest($ticketID){
        
        $ticket = $this->Helpdesk_model->getTicket($ticketID);
        
        $groupid = "g51514526";
        $description = $ticket->Subject;
        $company = $ticket->SubmitterUserInfo->CompanyName;
        $email = $ticket->SubmitterUserInfo->Email;
        $waitingMessage = "Hi ".$ticket->SubmitterUserInfo->Username.", You have been added to the TeamViewer queue. A technician will be with you shortly.";
        
        $result = $this->Teamviewer_model->createSession($groupid,$description,$company,$email,$waitingMessage);
        
        $clientLink = $result->end_customer_link;
        $techLink = $result->supporter_link;
        
        $body = "Your Teamviewer Credentials (Valid for 24 Hours) \nClient link: ".$clientLink."\nTechnician Link: ".$techLink;
        
        $this->Helpdesk_model->postReply($ticketID, $body);
        
    }
    
}