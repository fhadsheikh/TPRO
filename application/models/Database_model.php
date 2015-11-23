<?php

class Database_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
        $this->load->helper('date_helper');
    }
    
    public function fullsync($allTickets){
        
        
        foreach($allTickets as $key => $ticket){
            
            $allTickets[$key]['IssueDate'] = mysqlDate($ticket['IssueDate']);
            $allTickets[$key]['LastUpdated'] = mysqlDate($ticket['LastUpdated']);
            
            if($ticket['AssignedToUserID'] == null){
                $allTickets[$key]['AssignedToUserID'] = 0;
            }
            
            $allTickets[$key]['DatabaseResult'] = $this->db->replace('tickets', $allTickets[$key], 'IssueID');
        }
        
        return $allTickets;
        
    }
    
    // Checked
    public function getTicketsCount($start,$end){
        
        $bstart = workStartDay($start);
        $bend = workEndDay($end);
        
//        $this->db->select('IssueID');
//        $this->db->from('tickets');
//        $this->db->where("IssueDate BETWEEN '$bstart' AND '$bend' AND (CategoryID = 14 OR CategoryID = 3)");
//        $result = $this->db->count_all_results();
        
        $query = $this->db->query("SELECT COUNT(*) FROM tickets WHERE IssueDate BETWEEN '$bstart' AND '$bend' AND (CategoryID = 14 OR CategoryID = 3)");
        $result = $query->result_array();
        
        return $result;
        
    }
    
    public function getTickets($start,$end){

    $bstart = workStartDay($start);
    $bend = workEndDay($end);

    $this->db->select('*');
    $this->db->from('tickets');
    $this->db->where("IssueDate BETWEEN '$bstart' AND '$bend' AND (CategoryID = 14 OR CategoryID = 3)");
    $query = $this->db->get();
    $result = $query->result();

    return $result;
        
    }
    
    // To replace function getUnresponded()
    public function isUnresponded($ticket){
        
        $ticketID = $ticket->IssueID;
        //Set Timezone
        date_default_timezone_set('America/New_York');
        
        //Set var for Two Days Ago
        $today = date("l");
        
        if($today == "Monday"){
            $d = 4;
        } else if ($today == "Tuesday"){
            $d = 3;
        } else {
            $d = 2;
        }
        
        $twoDaysAgo = mktime(0,0,0, date("m"), date("d")-1, date("Y"));
        $yesterday = date('Y-m-d H:i:s', $twoDaysAgo);
    
        $plainTime = strtotime($ticket->LastUpdated); 
        $endTime = strtotime($yesterday);
            
        if($ticket->Status != 'Resolved' && $plainTime <= $endTime ){
            return true;
        }
        
        return false;
        
        
    }
    
    // Checked
    public function getOpen(){
        
        $this->db->select('*');
        $this->db->from('tickets');
        $this->db->where("Status != 'Resolved' AND (CategoryID = 3 OR CategoryID = 14)");
        $this->db->join('users', 'users.helpdesk_id = tickets.AssignedToUserID');
        $this->db->join('lupriority', 'lupriority.id = tickets.Priority');
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
        
    }
    
    // Checked
    public function getCategory($id){
        
        $this->db->select('*');
        $this->db->from('tickets');
        $this->db->where("Status = 'In progress' AND CategoryID = $id");
        $this->db->join('users', 'users.helpdesk_id = tickets.AssignedToUserID');
        $this->db->join('lupriority', 'lupriority.id = tickets.Priority');
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
        
    }
    
    public function getReminders(){
        
        $this->db->select('*');
        $this->db->from('reminders');
        $this->db->join('users', 'users.helpdesk_id = reminders.helpdesk_id');
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    // Checked
    public function getTechs(){
        
        $query = $this->db->query('SELECT * FROM users');
        $result = $query->result();
        return $result;
        
    }
    
    public function getUser($helpdeskID){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('helpdesk_id', $helpdeskID);
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    // Checked
    public function lookupTech($id){
        $this->db->select('name');
        $this->db->from('users');
        $this->db->where('helpdesk_id', $id);
        $query = $this->db->get();
        $result = $query->row();
        
        if(!isset($result->name)){
            return '<span class="label label-warning" style="color:black;">Unassigned</span>';
        } else { return $result->name; }
    }
    
    // Checked
    public function getCurrentlyOpen($id){
        
        $query = $this->db->query("SELECT * FROM tickets WHERE UserName = '$id' AND status = 'In progress'");
        $result = $query->result();
        
        return $result;
        
    }
        
//    // Checked
//    public function checkChange($tickets){
//        
//        $lastTicket = plainTime($tickets['LastUpdated']);
//        
//        $date = date( "Y-m-d H:i:s", $lastTicket);
//        
//        $this->db->select('LastUpdated');
//        $this->db->from('tickets');
//        $this->db->limit(1);
//        $this->db->order_by('LastUpdated', 'DESC');
//        $query=$this->db->get();
//        $result=$query->row();
//        
//        if($date == $result->LastUpdated){
//            return false;
//        } else { return true; }
//        
//    }
//    
//    // Checked
//    public function latestUpdated($tickets){
//        
//        date_default_timezone_set('America/New_York');
//        $hourAgo2 = date("Y-m-d H:i:s", strtotime('-15 minutes'));
//        $hourAgo = strtotime($hourAgo2);
//        
//        foreach($tickets as $key => $ticket){
//            
//            $lastUpdated = plainTime($ticket['LastUpdated']);
//            
//            if($lastUpdated >= $hourAgo){
//                $updatedTickets[] = $ticket;
//            }
//            
//        }
//        
//        if(isset($updatedTickets)){
//            return $updatedTickets;
//        }
//        
//    }
//    
//    // Checked
//    public function checkNew($tickets){
//        
//        foreach($tickets as $key => $ticket){
//            
//            $query = $this->db->query('SELECT * FROM tickets where IssueID ='.$ticket['IssueID']);
//            $result = $query->result();
//            
//            if(count($result) <= 0){
//                $newTickets[] = $ticket;
//                return $newTickets;
//            } else { return false;}
//            
//            
//        }
//        
//        
//    }
//    
//    // Checked
//    public function newComments($comments){
//        
//        foreach($comments as $comment){
//            
//            $query = $this->db->query('SELECT * FROM comments where CommentID ='.$comment->CommentID);
//            $result = $query->result();
//            
//            if(count($result) <= 0){
//                $newComments[] = $comment;
//                return $newComments;
//            } else {return false;}
//            
//        }
//        
//    }
//    
//    // Checked
//    public function insertComments($newComments){
//        
//        foreach($newComments as $key => $newComment){
//            
//            $comments[$key]['Body'] = $newComment->Body;
//            $comments[$key]['CommentDate'] = mysqlDate($newComment->CommentDate);
//            $comments[$key]['CommentID'] = $newComment->CommentID;
//            $comments[$key]['FirstName'] = $newComment->FirstName;
//            $comments[$key]['LastName'] = $newComment->LastName;
//            
//            $this->db->replace('comments', $comments[$key], 'CommentID');
//            
//        }
//        
//        
//    }

    
    
    public function getLatestTicket(){
        
        $this->db->select('LastUpdated');
        $this->db->from('tickets');
        $query = $this->db->get();
        $result = $query->row();
        
        return $result;
        
    }
    
    public function isNewTicket($ticket){

        $query = $this->db->query('SELECT * FROM tickets where IssueID ='.$ticket['IssueID']);
        $result = $query->row();

        if($result){ return false; } else { return true; };

        
    }
    
    public function insertNewTicket($ticket){
        
        $ticket['IssueDate'] = mysqlDate($ticket['IssueDate']);
        $ticket['LastUpdated'] = mysqlDate($ticket['LastUpdated']);
        
        $this->db->insert('tickets', $ticket);
        
    }
    
    public function updateTicket($ticket){
        
        $ticket['IssueDate'] = mysqlDate($ticket['IssueDate']);
        $ticket['LastUpdated'] = mysqlDate($ticket['LastUpdated']);
        
        $this->db->where('IssueID', $ticket['IssueID']);
        $this->db->update('tickets', $ticket);
    }
    
    public function isNewComment($comment){
        
        $query = $this->db->query('SELECT * FROM comments WHERE CommentID ='.$comment->CommentID);
        $result = $query->row();
        
        if($result){ return false; } else { return true; };
    }
    
    public function insertNewComment($comment){
        
        $commentArray['Body'] = $comment->Body;
        $commentArray['CommentDate'] = mysqldate($comment->CommentDate);
        $commentArray['CommentID'] = $comment->CommentID;
        $commentArray['FirstName'] = $comment->FirstName;
        $commentArray['LastName'] = $comment->LastName;
        $commentArray['IssueID'] = $comment->IssueID;
        $commentArray['UserID'] = $comment->UserID;
        $commentArray['Email'] = $comment->Email;
                
        $this->db->insert('comments', $commentArray);
    }
    
    
    // USER 
    
    public function getNotifications($userID){
//        $this->db->select('users.FirstName, users.LastName, comments.UserID, users.helpdesk_id, comments.IssueID, tickets.IssueID, tickets.AssignedToUserID');
//        $this->db->from('comments');
//        $this->db->join('users', 'comments.UserID = users.helpdesk_id');
//        $this->db->join('tickets', 'comments.IssueID = tickets.IssueID');
//        $this->db->where('AssignedToUserID', $userID);
//        $this->db->where('comments.UserID !=', $userID);
//        
//        $query = $this->db->get();
        
        $query = $this->db->query("
        
            SELECT comments.Email, comments.IssueID, comments.CommentID, comments.Body, comments.FirstName, comments.LastName, tickets.UserName

            FROM comments

            LEFT JOIN users ON users.helpdesk_id = comments.UserID

            LEFT JOIN tickets ON tickets.IssueID = comments.IssueID

            WHERE tickets.AssignedToUserID = $userID AND comments.UserID != $userID

            ORDER BY comments.commentID DESC

            LIMIT 10 
        
        ");
        $result = $query->result();
        
        return $result;
        
    }
    
}