<?php
session_start();
include "config.php";

if((!isset($_SESSION["loggedin"])) || $_SESSION["loggedin"] === false){
	header('location: logform.php');
}

if (isset($_POST['comment']) && isset($_POST['post_id'])){
	$poster = $_SESSION['id'];
    $post = $_POST['post_id'];
    $content = $_POST['comment'];

    $sql = "INSERT INTO comments (post_id, content, poster_id) VALUES ('$post','$content','$poster')";
    $result = mysqli_query($link, $sql);

    header('location: index.php');
}
else{
	header('location: index.php?err');
}

?>