<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'webadmin');
define('DB_PASSWORD', '');
define('DB_NAME', 'website');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$link){
	echo "Connection failed";
}
?>
