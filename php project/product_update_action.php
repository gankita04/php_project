
<?php
ob_start();

    require_once('db/connection.php');

    echo "<pre>";
    print_r($_POST);
    echo "<pre/>";

    echo "<pre>";
    print_r($_FILES);
    echo "<pre/>";

    $name = $connection->real_escape_string(strip_tags(trim($_POST['proName'])) );
    $price = strip_tags(trim($_POST['proPrice']));
    $discount = strip_tags(trim($_POST['proDisc']));
    $catid = strip_tags(trim($_POST['proCat']));
    $brid = strip_tags(trim($_POST['proBrand']));
    $desc = $connection->real_escape_string(strip_tags(trim($_POST['proDescription'])) );

    $id = $_SESSION['proid'];

    if(empty($_FILES['proImage']['name'])){
        $sqlQuery = "UPDATE products SET prodname='$name' , proprice='$price' , prodiscount='$discount' ,
        prodesc='$desc' , probrid='$brid' , procaid='$catid' WHERE proid='$id' ";
    }
    else{
        //if you are uploading new Image
        //new file upload , old file delete , query change
        
        $unique = time();
        $destination = "products/".$unique.$_FILES['proImage']['name'];
        $answer = move_uploaded_file($_FILES['proImage']['tmp_name'],$destination);

        $sqlquery = "SELECT propath FROM products WHERE proid='$id' ";
        $result = $connection->query($sqlquery) or die ($connection->error);
        $row = $result->fetch_object();
        // print_r($row);

        unlink($row->propath);

        $sqlQuery = "UPDATE products SET prodname='$name' , proprice='$price' , prodiscount='$discount' ,
        prodesc='$desc' , probrid='$brid' , procaid='$catid' , propath='$destination' WHERE proid='$id' ";

        // echo $sqlQuery;
    }

    // echo $sqlQuery;
    $result = $connection->query($sqlQuery) or die ($connection->error);
    if($result){
        unset($_SESSION['proid']);
        header("location:show_products.php");
    }
?>


