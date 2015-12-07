<?php

class Tech {
    
    protected $CI;
    
    public function __construct(){
        
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
        $this->CI->load->model('helpdesk_model');
        
    }
    
    public function isLoggedIn(){
        
        // If user is not logged in, redirect to 'User/Login' controller
        if($this->CI->session->userdata('LoggedIn')){ return true; } else { return false; };
        
    }
    
    public function authenticate($username, $password){
        
        $this->CI->session->set_userdata("credentials", base64_encode($username.":".$password));
        if($this->CI->helpdesk_model->authenticate()){ 
            $this->CI->session->set_userdata('LoggedIn', 'true'); 
        };

    }
    
    public function logout(){
        
        $this->CI->session->sess_destroy();
        
    }
    
    public function strip_html_tags( $text )
{
// Remove invisible content
    $text = preg_replace(
        array(
            //ADD a (') before @<head ON NEXT LINE. Why? see below
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
          // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
        ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
        ),
        $text );
    return strip_tags( $text );
}
    
    
}