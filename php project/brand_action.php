<?php
    // print_r($_REQUEST);

    require_once('db/connection.php');
    if(empty($_POST['brandName']) || strlen($_POST['brandName'])<2){
        echo "Category Name is invalid & Must have minimun 2 characters";
    }
    else{
        //  insert brand
        $rec = $connection->real_escape_string(strip_tags(trim($_POST['brandName'])));
        
        // check value exist or not
        $sqlQuery1 = "select count(brandname) as cnt from brand where brandname='$rec'";
        echo $sqlQuery1;

        $result = $connection->query($sqlQuery1) or die($connection->error);
        $answer = $result->fetch_assoc();
        // print_r($answer);

        if($answer['cnt'] > 0){
            echo "Brand Already Exist";
        }
        else{
            $sqlQuery = "insert into brand(brandname)values ('$rec') ";
            // echo $sqlQuery;

            $ans = $connection->query($sqlQuery) or die($connection->error);
            
            if($ans){
                echo "Brand Added";
            }
        }
    }
?>