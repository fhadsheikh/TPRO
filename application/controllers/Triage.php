<?php // Under housekeeping

defined('BASEPATH') OR exit('No direct script access allowed');

/* Triage Module Controller */

class Triage extends CI_Controller {

    /* Constructor for Triage Controller */

    public function __construct(){

        /* Load parent constructor as requirement of Codeigniter */

        parent::__construct();

        /* Load Dependencies */

        /* Models */

        /* Database Model */

        $this->load->model('Database_model');

        /* Helpers */

        /* Date Helper */

        $this->load->helper('date_helper');

        /* Check if user is logged in, otherwise redirect to login */

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

        $data['pageTitle'] = 'Triage';

        /* Techs variable returns all Technicians */

        $data['techs'] = $this->Database_model->getTechs();

        /* Load views */

        $this->load->view('html_header', $data);

        $this->load->view('headerbar');

        $this->load->view('triage', $data);

        $this->load->view('infobar');

        $this->load->view('html_footer');

    }

}
