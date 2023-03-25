<?php
    require_once('db/connection.php');
    print_r($_REQUEST);

    if(empty($_REQUEST['userName']) || strlen($_REQUEST['userName'])<3 || strlen($_REQUEST['userName'])>20)
    {
        echo "UserName is required & Must have 3 to 20 characters";
    }

    else if(empty($_REQUEST['userMobile']) || !ctype_digit($_REQUEST['userMobile']) || strlen($_REQUEST['userMobile'])!=10)
    {
        echo "User Mbile is Required & must be 10 digits";
    }

    else if(empty($_REQUEST['userEmail']) || !filter_var($_REQUEST['userEmail'],FILTER_VALIDATE_EMAIL))
    {
        echo"Email id is Required & must be valid email id";
    }

    elseif(empty($_REQUEST['userPass']) || !ctype_alnum($_REQUEST['userPass']) || strlen($_REQUEST['userPass']) < 4 || strlen($_REQUEST['userPass']) > 8)
    {
        echo "Password must be alpha numeric with min 4 and max 8 character";
    }

    elseif($_REQUEST['userPass'] !=$_REQUEST['userCPass'])
    {
        echo "Password & Confirm Password does not match";
    }

    else{
       
        // echo"ok";
        $name = $_REQUEST['userName'];
        $mobile = $_REQUEST['userMobile'];
        $email = $_REQUEST['userEmail'];
        $pass = sha1($_REQUEST['userPass']);
        // sha1 is use to encrypt password
        // echo $pass;

        // sql query prepare
        $sqlQuery = "insert into userinfo (username,usermobile,useremail,userpassword,userstatus) 
        values ('$name','$mobile','$email','$pass',1 )";

        // echo $sqlQuery;

        // print_r($connection);

        // query execute or query perform or query in db filter_has_var

        $ans_query = $connection->query($sqlQuery) or die($connection -> error);
        // var_dump($ans_query);

        if($ans_query){
            header("location:login.php");
        }
    }
?>