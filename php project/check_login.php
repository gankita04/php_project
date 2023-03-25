<?php
    session_start();
    if(isset($_SESSION['status'])){
        // echo "yes";
        header('location:dashboard.php');
    }
?>