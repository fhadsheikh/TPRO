<?php

class Gravatar_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getGravatar($email, $s = 200, $d = 'mm', $img = false, $r = 'g'){
        
        $url = 'http://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
        
    }
    
}



