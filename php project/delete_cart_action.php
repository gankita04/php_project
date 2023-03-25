<?php
    // print_r($_POST);
    $id = $_POST['id'];
    echo $id;

    if(isset($_COOKIE['cartRecord'])){
        $cookiedata = $_COOKIE['cartRecord'];
        echo  $cookiedata;

        // string to array for explode
        $ans = explode("," , $cookiedata);
        print_r($ans);

        if(count($ans) == 1){
            echo "Last pro for delete";
            unset($_COOKIE['cartRecord']);
            setcookie('cartRecord' , "" , time()-3600 , "/");
        }
        else{
            $indexno = array_search($id,$ans);
            print_r($indexno);

            unset($ans[$indexno]);

            print_r($ans);

            // array to string for implode
            $fans = implode("," , $ans);
            echo $fans;

            setcookie('cartRecord' , $fans , time()+3600 , "/");
        }
    }
?>