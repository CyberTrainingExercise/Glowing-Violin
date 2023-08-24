<?php
session_start();

include "config.php";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	header('location: index.php');
}
echo "Testing creds";
if (isset($_POST['username']) && isset($_POST['password'])){
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	$query = "SELECT * FROM users WHERE username='$uname' AND password = '$pass'";
	
	echo "query time";
	
	$result = mysqli_query($link, $query);
	
	if(mysqli_num_rows($result) === 1){
		$row = mysqli_fetch_assoc($result);
		if($row['username'] === $uname && $row['password'] === $pass){

			$SESSION['username'] = $uname;
			$SESSION['id'] = $row['user_id'];
			$SESSION['loggedin'] = 'true';

			header("location: index.php");
		}
		else{
			header("location: logform.php?errorI");
		}
	}
	else{
		header("location: logform.php?errorI");
	}
}
else{
	header("location: logform.php?errorF");
	exit();
}
?>