<?php
$host = "localhost";
$user = "root";
$password = "";
$dbame = "haritha";
$mysqli = new mysqli($host,$user,$password,$dbame);
if(mysqli_connect_errno()){
	echo "Could not connect database";
	exit;
}


?>