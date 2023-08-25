<?php
    session_start();
    include "config.php";

    if (isset($_POST['password'])){
        $uid = $_SESSION["id"];
        $pass = $_POST['password'];
        $query = "UPDATE users SET password = '$pass' WHERE user_id='$uid'";
        
        $result = mysqli_query($link, $query);
        
        if($result){
    
            header("location: account.php");
    
        }
        else{
            header("location: account.php?errorI");
        }
    }
    else{
        header("location: logform.php?errorF");
        exit();
    }

?>