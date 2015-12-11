<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Prepare Library
 * Used to prepare arrays for views
 */

class Prepare {
    
    public function __construct(){
        
        /* Load Dependencies */
        
        /* Get Instance - added step for using dependencies from libraries */
        
        $this->CI =& get_instance();

        /* Helpers */

        /* Date Helper:
         * For general date formatting functions
         */

        $this->CI->load->helper('date_helper');
        
        /* Models */
        
        /* Database Model*/
        
        $this->CI->load->model('Database_model');
        
        /* Gravatar Model */
        
        $this->CI->load->model('Gravatar_model');

    }
    
    /* Notifications method
     *
     * @access public
     * @param array $notifications - Array of notifications
     */
    
    public function notifications($notifications){
        
        /* View Requirement
         * $Name, $Subject, $Message, $Detail, $CommentDate, $Gravatar, $IssueID
         */
        
        /* Create array that will hold returned objects */
        
        $notif = array();
        
        foreach($notifications as $key => $notification){
            
            /* Create new object that will hold a notification */
            
            $notif[$key] = new stdClass();
            
            /* Set $link var to Issue ID Link html a tag */
            
            //$link = '<a href='.base_url().'tickets/ticket/'.$notification->IssueID.'>#'.$notification->IssueID.'</a>';
            $link = $notification->IssueID;
            
            /* $Name Requirement
             * Preference is to set user's full name as $name if available, otherwise use UserName.
             */
            
            if($notification->FirstName !== NULL)
            {
                $notif[$key]->Name = $notification->FirstName." ".$notification->LastName;
            }
            else
            {
                $notif[$key]->Name = $notification->Email;
            }
            
            /* $Subject Requirement
             * Set a subject based off common replies
             */

            if($notification->Body === 'New ticket submitted (email)')
            {
                
                $notif[$key]->Subject = 'submitted a new ticket '.$link;
                
            } 
            elseif($notification->Body == 'The ticket has been taken')
            {
                
                $notif[$key]->Subject = 'took over ticket '.$link;
                
            } 
            elseif(strpos($notification->Body, 'The ticket has been re-opened'))
            {
                
                $notif[$key]->Subject = 're-opened ticket '.$link;
                
            } 
            elseif($notification->Body == 'The ticket has been closed')
            {
                
                $notif[$key]->Subject = 'closed ticket '.$link;
                
            } 
            elseif(strpos($notification->Body, 'ticket has been assigned to technician:'))
            {
                
                $subjectSplit = explode(":", $notification->Body);
                $techLink = '<a href="'.$this->CI->Database_model->lookupTechByName(trim($subjectSplit[1])).'">'.$subjectSplit[1]."</a>";
                $notif[$key]->Subject = 'assigned ticket '.$link.' to '.$techLink;
                
            }
            else
            {
                
                $notif[$key]->Subject = 'replied to ticket '.$link;
                
            }
            
            /* $Detail Requirement
             * only if Body has more than 60 characters
             */
            
            if(strlen($notification->Body) > 60)
            {
                $notif[$key]->Detail = $notification->Body;
            }
            
            
            /* $CommentDate Requirement */

            if(isset($notification->CommentDate))
            {
                
                $notif[$key]->CommentDate = fromDate($notification->CommentDate);
                
            }
            
            /* $Gravatar Requirement */
            
            $notif[$key]->Gravatar = $this->CI->Gravatar_model->getGravatar($notification->Email);
            
            /* $IssueID Requirement */
            
            $notif[$key]->IssueID = $notification->IssueID;
        
        }
        
        return $notif;
        
    }
    
    /* Tickets Method
     * Formatted for DataTable
     * 
     * @access public
     * @param array $tickets - Array of tickets to be prepared
     */
    
    public function tickets($tickets){
        
        /* View requirement
         * 
         * $IssueID, $AssignedToUser, $Subject, $UserName, $Company, $Status, $Age 
         */
        
        foreach($tickets as $key => $ticket){
            
            /* $IssueID Requirement */
            
            $final_tickets[$key][] = "<a href='".base_url()."tickets/ticket/".$ticket->IssueID."'>$ticket->IssueID</a>";
            
            /* $AssignedToUser Requirement */
            
            $final_tickets[$key][] = $this->CI->Database_model->lookupTech($ticket->AssignedToUserID);
            
            /* $Subject Requirement
             * If priority is Critical, wrap subject in danger label
             */
            
            if($ticket->Priority === 2)
            {
                
                $final_tickets[$key][] = "<span class='label label-danger'>$ticket->Subject</span>";
                
            }
            else
            {
                
                $final_tickets[$key][] = $ticket->Subject;
                
            }
            
            /* $UserName Requirement */
            
            $final_tickets[$key][] = $ticket->UserName;
            
            /* Company Requirement */
            
            $final_tickets[$key][] = $ticket->CompanyName;
            
            /* $Status Requirement */
            
            $final_tickets[$key][] = $ticket->Status;
            
            /* $Age Requirement */
            
            $final_tickets[$key][] = daysFromToday($ticket->IssueDate)." day(s) ago";
            
        }
        
        return $final_tickets;
        
    }
    
    /* techStats Method
     * Formatted for DataTable
     *
     * @access public
     * @param array $techs - Array of Tech objects 
     * @param array $tickets - Array of Ticket objects
     */
    
    public function techStats($techs, $tickets){
        
        /* View Requirements
         * $TechName, $TicketCount, $Reminders
         */
        
        /* Double loop. Loop each tech then ticket within it */
        
        foreach($techs as $key => $tech){
            
            /* $TechName Requirement */
            
            $final_techStats[$key][] = $tech->name;
            
            /* $TicketCount Requirement */
            
            /* Start with empty counter var that will hold ticket count */
            
            $ticketCount = 0;
            
            foreach($tickets as $ticket){
                
                /* Get amount of tickets for tech */
                
                if($ticket->AssignedToUserID === $tech->helpdesk_id)
                {
                    
                    $ticketCount++;
                    
                }
                
            }
            
            $final_techStats[$key][] = $ticketCount;
            
            /* $Reminders Requirement */
            
            $final_techStats[$key][] = 0;
            
        }
        
        return $final_techStats;
        
    }
    
    /* Comments Method
     * Formatted for comment section on ticket page
     *
     * @access public
     * @param array $comments - Array of Comment objects
     */
    
    public function comments($comments){
        
        /* View Requirements
         * $UserName, $Gravatar, $CommentDate, $Body, $ForTechsOnly, $Recipients
         */
        
        /* Create array that will hold returned objects */
        
        $final_comments = array();
        
        foreach($comments as $key => $comment){
            
            /* Create new object that will hold a notification */
            
            $final_comments[$key] = new stdClass();

            /* $UserName Requirement */
            
            $final_comments[$key]->UserName = $comment->UserName;
            
            /* $Gravatar Requirement */
            
            $final_comments[$key]->Gravatar = $this->CI->Gravatar_model->getGravatar($comment->Email);
            
            /* $CommentDate Requirement */
            
            $final_comments[$key]->CommentDate = mysqlDateTimeFirst($comment->CommentDate);
            
            /* $Body Requirement */
            
            $final_comments[$key]->Body = $comment->Body;
            
            /* $ForTechsOnly Requirement */
            
            $final_comments[$key]->ForTechsOnly = $comment->ForTechsOnly;
            
            /* $Recipients Requirement */
            
            $final_comments[$key]->Recipients = $comment->Recipients;
            
        }
        
        return $final_comments;
        
    }
    
}