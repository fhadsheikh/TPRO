<?php // Under housekeeping

defined('BASEPATH') OR exit('No direct script access allowed');

/* Tickets HelpDesk Module Controller */

class Tickets extends CI_Controller {

    /* Constructor for Tickets Controller */

    public function __construct(){

        /* Load parent constructor as requirement of Codeigniter */

        parent::__construct();

        /* Load Dependencies */

        /* Models */

        /* HelpDesk Model */

        $this->load->model('Helpdesk_model');

        /* Database Model */

        $this->load->model('Database_model');

        /* Gravatar Model */

        $this->load->model('Gravatar_model');

        /* Helpers */

        /* Date Helper*/

        $this->load->helper('date_helper');


        /* Libraries */

        /* Prepare Library */

        $this->load->library('prepare');

        /* Check if user is logged in, otherwise redirect to login */

        if($this->auth->is_logged_in() !== TRUE)
        {

            redirect('user/login');

        }

    }

    /* Index Method
     *
     * @access public
     * @return view
     */

    public function index(){

        /* View var for page title */

        $data['pageTitle'] = 'Tickets';

        /* Load Views */

        $this->load->view('html_header', $data);

        $this->load->view('headerbar');

        $this->load->view('tickets', $data);

        $this->load->view('infobar');

        $this->load->view('html_footer');

    }

    /* Ticket Method
     *
     * @access public
     * @param int $id - Helpdesk Ticket ID a.k.a Issue ID
     * @return view
     */

    public function ticket($id = NULL){

        /* If $id is null, redirect to tickets page */

        if($id === NULL)
        {

            redirect('tickets');

        }

        /* Retrieve Ticket Details from HelpDesk */

        $ticket = $this->Helpdesk_model->getTicket($id);

        /* Throw 404 if ticket wasn't found in helpdesk */

        if($ticket)
        {

            /* Retrieve Ticket Comments */

            $comments = $this->Helpdesk_model->getComments($id);

            /* Prepare Comments */

            $data['comments'] = $this->prepare->comments($comments);

            /* Get currently open tickets from User */

            $data['currentlyOpen'] = $this->Database_model->getCurrentlyOpen($ticket->SubmitterUserInfo->Username);

            /* Get count of currently open tickets from User */

            $data['currentlyOpenCount'] = count($data['currentlyOpen']);

            /* Get Technician Information  */

            $data['techdb'] = $this->Database_model->getUser($this->session->UserID);

            $data['ticket'] = $ticket;

            /* Set page title */

            $data['pageTitle'] = 'Ticket ID '.$id;

            $this->load->view('html_header', $data);

            $this->load->view('headerbar');

            $this->load->view('ticket', $data);

            $this->load->view('infobar');

            $this->load->view('html_footer');

        }
        else
        {

            $data['pageTitle'] = 'Ticket ID '.$id.' not found';

            $data['error'] = "Ticket $id not found";

            $data['details'] = "Please verify if the ticket exists in the helpdesk and you have permission to view it.";

            header("HTTP/1.1 404 Not Found");

            $this->load->view('html_header', $data);

            $this->load->view('headerbar');

            $this->load->view('404', $data);

            $this->load->view('infobar');

            $this->load->view('html_footer');

            return;

        }

    }

    /* Search Method
     *
     * @access public
     */

    public function search(){

        /* Get POST variable */
        $id = $this->input->post('ticketID');

        redirect("tickets/ticket/$id");

    }

    /* Reply Method
     *
     * @access public
     */

    public function reply(){

        /* Assign POST vars to local vars */

        $ticketID = $this->input->post('ticketID');

        $body = $this->input->post('body');

        /* Send Reply */

        $this->Helpdesk_model->postReply($ticketID, $body);

    }

}
