<?php
    if(session_id() == ""){
        session_start();
    }

    if(!isset($_SESSION['name'])){
        echo "Redirect To Login.php";
        header('location:logout.php');
    }
?>