<?php

class Pusher_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    
    public function notifyNewTicket($newTickets){
        foreach($newTickets as $key => $newTicket){
            $data['ticketID'] = $newTicket['IssueID'];
            $data['body'] = $newTicket['Subject'];
            $this->pusher->trigger('ticketMonitor', 'newTicket', $data);
        }
    }
    
    public function commentNotification($newComment){
        
        $data['Name'] = $newComment->FirstName." ".$newComment->LastName;
        $data['body'] = strip_tags($newComment->Body);
        
        echo $this->pusher->trigger('ticketMonitor', 'newComment', $data);
        
        echo "Pass";
        
    }
    
    public function newTicket($ticket){
        $data['ticketID'] = $ticket['IssueID']." ".$ticket['CompanyName'];
        $data['body'] = $ticket['Subject'];
        
        $this->pusher->trigger('ticketMonitor', 'newTicket', $data);
    }
    
    public function newComment($comment){
        $data['Name'] = $comment->FirstName." ".$comment->LastName;
        $data['body'] = strip_tags(preg_replace("/<br\W*?\/>/", "\n", $comment->Body));
        
        if(isset($comment->FirstName)){
            $data2['username'] = $comment->FirstName." ".$comment->LastName;
        } else {
            $data2['username'] = $comment->UserName;
        }
        $data2['time'] = date("H:i A", plaintime($comment->CommentDate));
        $data2['message'] = "#$comment->IssueID: $comment->Body";
        
        
        
        $this->pusher->trigger('ticketMonitor', 'newComment', $data);
        $this->pusher->trigger('tickdetMonitor', 'feed', $data2);
    }
    
    public function update(){
        $data['Name'] = 'Placeholder';
        
        $this->pusher->trigger('ticketMonitor', 'tickets_updated', $data);
        
    }
    
    
}