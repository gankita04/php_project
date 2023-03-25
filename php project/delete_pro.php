<?php
    // echo "test";
    require_once('db/connection.php');
    // print_r($_REQUEST);
    $id = $_REQUEST['record'];
    // echo $id;

    $sqlquery = "SELECT propath FROM products WHERE proid='$id'";
    $result = $connection->query($sqlquery) or die($connection->error);
    $row = $result->fetch_object();
    // print_r($row);

    $sqlquery = "DELETE FROM products WHERE proid='$id'";
    // echo $sqlquery;

    $result = $connection->query($sqlquery) or die($connection->error);
    if($result){
        unlink($row->propath);
        echo "Deleted";
    }
?>