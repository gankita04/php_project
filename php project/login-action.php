<?php
    require_once('db/connection.php');
    print_r($_REQUEST);
    
    if(empty($_REQUEST['userEmail']) || !filter_var($_REQUEST['userEmail'],FILTER_VALIDATE_EMAIL))
    {
        echo"Email id is Required & must be valid email id";
    }

    elseif(empty($_REQUEST['userPassword']) || !ctype_alnum($_REQUEST['userPassword']) ||
     strlen($_REQUEST['userPassword']) < 4 || strlen($_REQUEST['userPassword']) > 8)
    {
        echo "Password must be alpha numeric with min 4 and max 8 character";
    }
    
    else{
        $email = $_REQUEST['userEmail'];
        $txtPass = sha1($_REQUEST['userPassword']);

        // query prepare
        $sqlquery = "select userpassword,userid,username,usermobile,userstatus from userinfo
         where useremail='$email' ";
        echo "$sqlquery";

        // query execute
        $ans_query = $connection->query($sqlquery) or die($connection ->error);
        print_r($ans_query);

        if($ans_query -> num_rows > 0){
            // echo "Check Pass";

            $fans = $ans_query -> fetch_assoc();
            print_r($fans);

            $dbpass = $fans['userpassword'];

            if($txtPass != $dbpass){
                echo "Password mismatch";
            }
            else{
                echo "Auth Complete";
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $fans['userid'];
                $_SESSION['name'] = $fans['username'];
                $_SESSION['mobile'] = $fans['usermobile'];
                $_SESSION['status'] = $fans['userstatus'];

                header("location:dashboard.php");
            }
        }

        else{
            echo "emailid Does Not Exist";
        }
       }
?>