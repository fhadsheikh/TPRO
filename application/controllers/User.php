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
        
        $this->load->helper('date_helper');
        $this->load->model('Database_model');
        $this->load->model('Gravatar_model');
        $this->load->model('Geo_model');
        $this->load->library('Html2Text');
        
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
        
        $this->load->config('pusher');
        $this->session->set_userdata('pusher_api_key', $this->config->item('pusher_api_key'));
        
        redirect('dashboard');
        
    }
    
    public function getNotifications($userID){
        
        $notifications = $this->Database_model->getNotifications($userID);
        
        
        
        foreach($notifications as $key => $notification){
            
            
            if($notification->FirstName == null){
                $notifications[$key]->Name = $notification->UserName;
            } else {
                $notifications[$key]->Name = $notification->FirstName." ".$notification->LastName;
            }
            
            
            if($notification->Body == 'New ticket submitted <b>(email)</b>'){
                $notifications[$key]->Message = 'created a new ticket (#'.$notification->IssueID.')';
            } elseif(strlen($notification->Body) > 40){
                $notifications[$key]->Message = 'Updated ticket #'.$notification->IssueID;
            } 
            else {
                $notifications[$key]->Message = $notification->Body;
            }
            
            $notifications[$key]->Gravatar = $this->Gravatar_model->getGravatar($notification->Email);
            $notifications[$key]->IssueID = $notification->IssueID;
        }
        echo json_encode(array_reverse($notifications));
  
        //echo "<pre>"; print_r($notifications); echo "</pre>";
        
    }
    
    public function logout(){
        
        // Functional method, does not display a view. Simply redirects after destroying the session
        
        $this->tech->logout();
        
        // Redirect to login page after logging out
        redirect('user/login');

    }
    
    public function profile($userID){
        
                ($this->tech->isLoggedIn() ? : redirect('user/login'));

        
        $data['geoLocation'] = $this->Geo_model->getLocation($this->session->IPAddress);
        
        $data['user'] = $this->Database_model->getUser($userID);
        
        $data['gravatar'] = $this->Gravatar_model->getGravatar($data['user'][0]->email);
        
        $comments = $this->Database_model->getComments($userID);
        $mentions = $this->Database_model->getMentions($userID);
        
        foreach($comments as $key => $comment){
            
            $link = '<a href='.base_url().'tickets/ticket/'.$comment->IssueID.'>#'.$comment->IssueID.'</a>';
            
            if($comment->Body == 'New ticket submitted (email)'){
                $comment->Subject = 'submitted a new ticket '.$link;
            } elseif($comment->Body == 'The ticket has been taken'){
                $comment->Subject = 'took over ticket '.$link;
            } elseif(strpos($comment->Body, 'The ticket has been re-opened')){
                $comment->Subject = 're-opened ticket '.$link;
            } elseif($comment->Body == 'The ticket has been closed'){
                $comment->Subject = 'closed ticket '.$link;
            } elseif(strpos($comment->Body, 'ticket has been assigned to technician:')){
                $subjectSplit = explode(":", $comment->Body);
                $techLink = '<a href="'.$this->Database_model->lookupTechByName(trim($subjectSplit[1])).'">'.$subjectSplit[1]."</a>";
                $comment->Subject = 'assigned ticket '.$link.' to '.$techLink;
            }else {
                $comment->Subject = 'replied to ticket <a href='.base_url().'tickets/ticket/'.$comment->IssueID.'>#'.$comment->IssueID.'</a>';
                $comment->Detail = strip_tags($comment->Body);
            }
            
            if(isset($comment->CommentDate)){
                $comment->CommentDate = fromDate($comment->CommentDate);
            }
        }
        
        foreach($mentions as $key => $comment){
            
            $link = '<a href='.base_url().'tickets/ticket/'.$comment->IssueID.'>#'.$comment->IssueID.'</a>';
            
            if($comment->Body == 'New ticket submitted'){
                $comment->Subject = 'submitted a new ticket '.$link;
            } elseif($comment->Body == 'The ticket has been taken'){
                $comment->Subject = 'took over ticket '.$link;
            } elseif(strpos($comment->Body, 'The ticket has been re-opened')){
                $comment->Subject = 're-opened ticket '.$link;
            } elseif($comment->Body == 'The ticket has been closed'){
                $comment->Subject = 'closed ticket '.$link;
            } elseif(strpos($comment->Body, 'ticket has been assigned to technician:')){
                $subjectSplit = explode(":", $comment->Body);
                $techLink = '<a href="'.$this->Database_model->lookupTechByName(trim($subjectSplit[1])).'">'.$subjectSplit[1]."</a>";
                $comment->Subject = 'assigned ticket '.$link.' to '.$techLink;
            }else {
                $comment->Subject = 'replied to ticket <a href='.base_url().'tickets/ticket/'.$comment->IssueID.'>#'.$comment->IssueID.'</a>';
                $comment->Detail = $this->tech->strip_html_tags($comment->Body);
            }
            
            if(isset($comment->CommentDate)){
                $comment->CommentDate = fromDate($comment->CommentDate);
            }
            
            $comment->Gravatar = $this->Gravatar_model->getGravatar($comment->Email);
        }
        
        $users = $this->Database_model->getTechs();
        
        foreach($users as $user){
            $user->Gravatar = $this->Gravatar_model->getGravatar($user->email);
        }
        
        $data['users'] = $users;
        $data['comments'] = $comments;
        $data['mentions'] = $mentions;
        $data['pageTitle'] = 'Profile';
        
        // Load Dashboard views
        $this->load->view('html_header', $data);
        $this->load->view('headerbar');
        $this->load->view('profile', $data);
        $this->load->view('infobar');
        $this->load->view('html_footer');
        
    }
    
}