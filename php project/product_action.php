<?php
    require_once('db/connection.php');

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    if($_FILES['proImage']['error'] == 4){
        echo "Please Select File";
    }
    else if($_FILES['proImage']['size'] > 1024*1024*10){
         echo "FileSize must be below 2MB";
    }
    else if($_FILES['proImage']['type'] == "image/jpeg" || $_FILES['proImage']['type'] == "image/png"){
        // echo "File Upload";
        $unique = time();
        $destination = "products/".$unique.$_FILES['proImage']['name'];
        // echo $destination;

        $answer = move_uploaded_file($_FILES['proImage']['tmp_name'] , $destination);
        print_r ($answer);
        var_dump($answer);

        // DB Insert Product
        $name = $connection->real_escape_string(strip_tags(trim($_POST['proName'])) );
        $price = strip_tags(trim($_POST['proPrice']));
        $discount = strip_tags(trim($_POST['proDisc']));
        $catid = strip_tags(trim($_POST['proCat']));
        $brid = strip_tags(trim($_POST['proBrand']));
        $desc = $connection->real_escape_string(strip_tags(trim($_POST['proDescription'])) );
        $path = $destination;

        $sqlquery = "insert into products (prodname,proprice,prodiscount,prodesc,probrid,procaid,propath) 
        values('$name','$price','$discount','$desc','$brid','$catid','$path')";

        // echo $sqlquery;

        // exit;

        $result = $connection->query($sqlquery) or die($connection->error);
        if($result){
            echo "Product Added";
            header("location:index.php");
        }

    }
    else{
        echo "Invalid File Selected";
    }
?>