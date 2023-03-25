<?php
    // print_r($_POST);
    $idToStore = $_POST['proid'];
    // echo $idToStore;
    
    // assume cookie variable name is cartRecord
    if(! isset($_COOKIE['cartRecord'])){
        // echo "Add ur first Product in cart";
        setcookie('cartRecord' ,  $idToStore , time()+3600 , "/");
        echo "Product Added In Cart";
    }
    else{
        // echo "Update ur cart from 2nd product onward";
        $cookiesData = $_COOKIE['cartRecord'];
        // print_r ($cookiesData);
        $ans = explode("," ,  $cookiesData);
        // print_r($ans);

        $result = in_array($idToStore ,  $ans);
        // var_dump($result);
        if($result){
            echo "Product Exist In Cart";
        }
        else{
            $finalRecord = $cookiesData.",".$idToStore;
            // echo $finalRecord;
            setcookie('cartRecord' , $finalRecord , time()+3600 , "/");
            echo "Product Updated In Cart";
        }
    }
?>