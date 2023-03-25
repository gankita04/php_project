<?php
    // print_r($_REQUEST);
    // print_r($_POST);
    require_once('db/connection.php');

    if(empty($_POST['categoryName']) || strlen($_POST['categoryName'])<2){
        echo "Category Name is invalid & Must have minimun 2 characters";
    }
    else{
        //  insert category
        $rec = $connection->real_escape_string(strip_tags(trim($_POST['categoryName'])));
        
        // check value exist or not4
        $sqlQuery1 = "select count(catname) as cnt from categories where catname='$rec'";
        // echo $sqlQuery1;

        $result = $connection->query($sqlQuery1) or die( $connection->error);
        $answer = $result->fetch_assoc();
        // print_r($answer);

        // exit;

        if($answer['cnt'] > 0){
            echo "Category Already Exist";
        }
        else{
            $sqlQuery = "insert into categories(catname)values ('$rec') ";
            echo $sqlQuery;

            $ans = $connection->query($sqlQuery) or die($connection->error);
            
            if($ans){
                echo "Category Added";
            }
        }
    }
?>