<?php

class Clockwork_model extends CI_Model{
    
    private $conn;
    
    public function __construct(){
        
        $serverName = "stableclockwork, 1434";
        $connectionInfo = array( "Database" => "ClockWorkTechno", "UID" => "tp", "PWD" => "techno03");
        
        $this->conn = sqlsrv_connect($serverName, $connectionInfo);
        
        if($this->conn){
            
        } else {
            echo "Connection could not be established";
            dir(print_r(sqlsrv_errors(), true));
        }
        
    }
    
    
    public function getTrainings(){
        
        $sql = "Select top 1000 appointments.appointmentid, attendees.personid, appointments.AppTypeID, appointments.cancelled, appointments.startDate, appointments.endDate, appointments.dateAdded from appointments LEFT JOIN attendees on attendees.AppointmentID = appointments.AppointmentID WHERE cancelled <> 1 AND (AppTypeID = 91 OR AppTypeID = 107) ORDER BY dateAdded DESC";
        
        $stmt = sqlsrv_query($this->conn, $sql);
        
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        $trainings = array(0 => array("Fhad", 0, 0));
        
        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
           
                $data[] = $row;
                
            
            
        }
        
        return $data;
        
    }
    
}