<?php
// @session_start();
if(session_id() == ""){
    session_start();
}
    $connection = new mysqli("localhost","root","","task");
    //print_r($connection);
    
    //document.
    if($connection->connect_error){
        echo $connection->connect_error;
        exit();
    }
?>