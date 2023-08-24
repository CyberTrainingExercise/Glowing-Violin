<?php
    include "config.php";

    if (isset($_POST['password'])){
        $uid = $_SESSION["id"];
        $pass = $_POST['password'];
        $query = "UPDATE users SET password = '$password' WHERE user_id='$uname'";
        
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