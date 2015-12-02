<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Triage extends CI_Controller {
    
    public function __construct(){
        
        parent::__construct();
        
        $this->load->model('Database_model');
        $this->load->helper('date_helper');
        
        ($this->tech->isLoggedIn() ? : redirect('user/login'));
        
    }
        
    public function index(){
        
        $data['pageTitle'] = 'Triage';
        
        $data['techs'] = $this->Database_model->getTechs();
        
        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('triage', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');
        
    }
    
    // AJAX HANDLERS for http requests
    
    public function get($start,$end){
        
        
        // Get Tickets
        $tickets = $this->Database_model->getTickets($start,$end);
        
        
        foreach($tickets as $key => $t){
            $data[$key][] = '<a href="tickets/ticket/'.$t->IssueID.'">'.$t->IssueID.'</a>';
            $data[$key][] = $this->Database_model->lookupTech($t->AssignedToUserID);
            //$data[$key][] = '<a href="tickets/ticket/'.$t->IssueID.'">'.$t->Subject.'</a>';
            if($t->Priority == '2'){
                $data[$key][] = "<span class='label label-danger'>$t->Subject</span>";
            } else {
                $data[$key][] = $t->Subject;
            }
            $data[$key][] = $t->UserName;
            $data[$key][] = $t->CompanyName;
            if($t->Status == 'New'){
                $data[$key][] = "<span class='label label-danger'>".$t->Status." </span>";
            } else if($t->Status == 'In progress') {
                $data[$key][] = "<span class='label label-success'>".$t->Status." </span>";
                
            } else if($t->Status == 'Resolved'){
                $data[$key][] = "<span class='label label-default'>".$t->Status." </span>";

            } else {
                $data[$key][] = $t->Status;
            }
            $data[$key][] = daysFromToday($t->IssueDate)." day(s) ago";
        }
        
        echo json_encode($data);
        
    }
    
    public function getTechs($start,$end){
        
        //Ajax handler for Triage app. Sends back Technician Stats
        
        $techs = $this->Database_model->getTechs();
        $test = $this->Database_model->getTickets($start,$end);
        $reminders = $this->Database_model->getReminders();
        $y = 0;
        foreach($techs as $key => $tech){
            $i = 0;
            $x = 0;
            
            
            
            if($tech->Tech == 1){
                foreach($test as $ticket){
                    if($ticket->AssignedToUserID == $tech->helpdesk_id){
                        $i++;
                    }
                }

                
                $techCount[$y][] = $tech->name;
                $techCount[$y][] = $i;
                
                foreach($reminders as $reminder){
                    if($reminder->helpdesk_id == $tech->helpdesk_id){
                        $x++;
                    }

                }

                $techCount[$y][] = $x;
                $y++;
            }
        }

        echo json_encode($techCount);
        
    }

    public function getOpen(){
        
        $tickets = $this->Database_model->getOpen();
        
        foreach($tickets as $key => $ticket){
            $data[$key][] = '<a href="tickets/ticket/'.$ticket->IssueID.'">'.$ticket->IssueID.'</a>';
            $data[$key][] = $ticket->name;
            if($ticket->Priority == '1'){
                $data[$key][] = "<span class='label label-danger'>$ticket->Subject</span>";
            } else {
                $data[$key][] = $ticket->Subject;
            }
            $data[$key][] = $ticket->UserName;
            $data[$key][] = $ticket->CompanyName;
            if($this->Database_model->isUnresponded($ticket) == true){
                $data[$key][] = "<span class='label label-info'>Unresponded</span>";
            } else if($ticket->Status == 'New'){
                $data[$key][] = "<span class='label label-danger'>".$ticket->Status." </span>";
            } else if($ticket->Status == 'In progress') {
                $data[$key][] = "<span class='label label-success'>".$ticket->Status." </span>";
                
            } else if($ticket->Status == 'Resolved'){
                $data[$key][] = "<span class='label label-default'>".$ticket->Status." </span>";

            } else {
                $data[$key][] = $ticket->Status;
            }
            $data[$key][] = daysFromToday($ticket->IssueDate)." day(s) ago";
        }
        
        echo json_encode($data);
        
    }
    
    public function getTrainings($startDate1, $endDate1){
        
        $startDate = strtotime($startDate1);
        $endDate = strtotime($endDate1 . "+1 days");
        
        $this->load->model('Clockwork_model');
        
        $trainings = $this->Clockwork_model->getTrainings();
        
        foreach($trainings as $key => $training){
            
            $data[$key]['AppointmentID'] = $training['appointmentid'];
            $data[$key]['AppointmentTypeID'] = $training['AppTypeID'];
            $data[$key]['Cancelled'] = $training['cancelled'];
            $data[$key]['StartDate'] = strtotime($training['startDate']->format('Y-m-d H:i'));
            $data[$key]['EndDate'] = strtotime($training['endDate']->format('Y-m-d H:i') );
            $data[$key]['PersonID'] = $training['personid'];
        
        }
        
        foreach($data as $key => $value){
            
            if($value['StartDate'] > $startDate && $value['EndDate'] < $endDate){
                
                $new[$key]['AppointmentID'] = $value['AppointmentID'];
                $new[$key]['StartDate'] = date("Y-m-d H:i", $value['StartDate']);
                $new[$key]['EndDate'] = date("Y-m-d H:i", $value['EndDate']);
                $new[$key]['PersonID'] = $value['PersonID'];
                
            } 
            
        }
        
        
        $techs = $this->Database_model->getTechs();
        $i= 0;
        
        foreach($techs as $key => $tech){
            
            
            $total = 0;
            $sum = 0;
            
            if(isset($new)){
                foreach($new as $app){

                    if($app['PersonID'] == $tech->clockwork_id){

                        $start = strtotime($app['StartDate']);
                        $end = strtotime($app['EndDate']);

                        $sum = $end - $start;
                        $total = $total + $sum;

                    }

                }
            }
            
            if($total){
                
                $originalDate = date("H:i", $total);
                $newDate = strtotime('-1 hour', strtotime ($originalDate));
                $trainingHours[$i][] = $tech->name;
                $trainingHours[$i][] = date("H:i", $newDate);
                $trainingHours[$i][] = 0;
                $i++;
                
            }
            
        }
        
        if(!isset($trainingHours)){
           $trainingHours = array(array(" ", " ", " "));
        } 
        
        
        echo json_encode($trainingHours);
        
//        echo "<pre>";print_r($trainings);echo "</pre>";
        
    }          

    
}