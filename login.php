<?php

include "config.php";

echo "Testing creds";
if (isset($_POST['username']) && isset($_POST['password'])){
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	$query = "SELECT * FROM users WHERE username='$uname' AND password = '$pass'";
	
	echo "query time";
	
	$result = mysqli_query($link, $query);
	
	if(mysqli_num_rows($result)){
		echo "Success!";
	}
	else{
		echo "Fail";
	}
}
else{
	echo "Not set";
	exit();
}
?>