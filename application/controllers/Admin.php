<?php

class Admin extends CI_Controller {

    public function __construct(){
        
        parent::__construct();

        ($this->auth->is_logged_in() ? : redirect('user/login') );
        
        $this->load->model('Helpdesk_model');
        $this->load->model('Database_model');
        $this->load->model('Pusher_model');
        $this->load->model('Teamviewer_model');
                
        $this->load->config('pusher');
        $this->load->config('settings');
        
       
        
    }

    public function index(){
        redirect('admin/update');
    }

    public function update(){

        // This page will continue to refresh to update ticket database.
        // Only needed until we update Helpdesk version so we can use triggers instead

        // Set pagetitle
        $data['pageTitle'] = 'Update';

        // Get latest tickets from helpdesk
        $tickets = $this->Helpdesk_model->getAllTickets(1,1);

        // Compare Last Updated date of latest updated helpdesk ticket vs database last updated
        // Returns true if dates are not the same
        $isChange = $this->Database_model->checkChange($tickets[0]);

        $newTickets = $this->Database_model->checkNew($tickets);

        // Notify of each new ticket
        if($newTickets){
            $this->Pusher_model->notifyNewTicket($newTickets);
        }

        // If dates are changed
        // Build array of only tickets updated within 15 minutes
        if($isChange == true){

            $newTickets = $this->Database_model->latestUpdated($tickets);

            $this->Database_model->fullsync($newTickets);
            $data['tickets'] = $newTickets;

            // Pusher - Send if updates were made
            $this->Pusher_model->ticketsUpdated();

            foreach($newTickets as $newTicket){

                $comments = $this->Helpdesk_model->getComments($newTicket['IssueID']);

                $newComments = $this->Database_model->newComments($comments);

                if($newComments == true){
                    $this->Database_model->insertComments($newComments);
                    foreach($newComments as $key => $newComment){
                        $this->Pusher_model->commentNotification($newComment);
                                        print_r($newComments);
                    }

                }
            }

        } else { $data['tickets'] = null; }







        $data['refresher'] = '<meta http-equiv="refresh" content="1">';

//        //Load views
        $this->load->view('html_header', $data);
//        $this->load->view('headerbar');
        $this->load->view('admin', $data);
//        $this->load->view('infobar');
        $this->load->view('html_footer');

    }

    public function sync(){


        // Get latest HD tickets
        $tickets = $this->Helpdesk_model->getAllTickets(1, 3);

        // Get Latest current ticket in the DB
        $latestTicket = $this->Database_model->getLatestTicket();

        // Create a new array of only tickets lastupdated since the latest not including the latest
        foreach($tickets as $key => $ticket){
            if(mysqldate($ticket['LastUpdated']) > $latestTicket->LastUpdated){
                $newTickets[] = $ticket;
            }
        }

        foreach($newTickets as $key => $newTicket){

            if($this->Database_model->isNewTicket($newTicket) == true){

                // Tickets don't exist in DB at all then create it
                $this->Database_model->insertNewTicket($newTicket);

                // Send desktop notification
                $this->Pusher_model->newTicket($newTicket);
                
                $this->Pusher_model->update();


            } else {

                //Update Ticket
                $this->Database_model->updateTicket($newTicket);


                // Get comments for ticket
                $comments2 = $this->Helpdesk_model->getComments($newTicket['IssueID']);

                if(count($comments2) > 0){

                    if(count($comments2) == 1){
                        $comments[] = $comments2[0];
                    } else if(count($comments2) > 1){
                    for($i = 0; $i <= 1; $i++){
                        $comments[] = $comments2[$i];
                    }
                    }

                    foreach($comments as $key => $comment){

                        if($this->Database_model->isNewComment($comment)){

                            $this->Database_model->insertNewComment($comment);

                            $this->Pusher_model->newComment($comment);

                            if($comment->Body == "Connection Pending"){
                                $session = $this->Teamviewer_model->createSession('g51514526', 'TV session for '.$comment->IssueID, $newTicket['CompanyName'], $comment->Email, 'A TPRO Support Consultant will be with you shortly.');
                                $ticketID = $comment->IssueID;
                                $body = "TeamViewer Credentials: (Valid for 24 hours) \n Client Link: $session->end_customer_link \n Tech Link: $session->supporter_link";
                                $this->Helpdesk_model->postReply($ticketID, $body);
                            }



                        }

                    }
                    
                    $this->Pusher_model->update();

                    }
                }
        }

echo '<html><head><meta http-equiv="refresh" content="5"></head></html>';

    }

    public function test(){
        $this->Pusher_model->commentNotification("test");
    }

    public function fullsync($count = 1){

        ini_set('max_execution_time', 0);
        // Get all tickets from helpdesk
        $this->load->model('Helpdesk_model');

        $data['pageTitle'] = 'Triage';
        $allTickets = $this->Helpdesk_model->getAllTickets($count);

        // Import tickets into Database
        $data['allTickets'] = $this->Database_model->fullsync($allTickets);


        redirect('triage');


    }

    public function settings(){

        
        $data['modules'] = $this->config->item('modules');

        $data['tech']['username'] = $this->session->Username;
        $data['tech']['name'] = $this->session->FirstName." ".$this->session->LastName;
        $data['tech']['company'] = $this->session->CompanyName;
        $data['tech']['ticketsHandled'] = $this->session->TicketsHandled;
        $data['tech']['helpdeskID'] = $this->session->UserID;
        $data['tech']['clockworkID'] = 'XXXXXXX';

        $data['pusher_apiKey'] = $this->config->item('pusher_api_key');
        $data['pusher_secret'] = $this->config->item('pusher_secret');
        $data['pusher_app_id'] = $this->config->item('pusher_app_id');

        $data['pageTitle'] = 'Settings';

        $data['techdb'] = $this->Database_model->getUser($this->session->UserID);

        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('settings', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');

    }
}
