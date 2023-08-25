<?php
    session_start();

    if((!isset($_SESSION["loggedin"])) || $_SESSION["loggedin"] === false){
        header('location: logform.php?err');
    }

    session_destroy();

    header('location: logform.php');
?>