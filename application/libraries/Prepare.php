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

    }
    
    /* Notifications method
     *
     * @access public
     * @param array of objects $notifications
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
    
}