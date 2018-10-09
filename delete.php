<?php
	include "dbconnect.php";
	$action = isset($_GET['action'])?$_GET['action']:"";
	if($action == "delete"){
		$query = "delete from student where id='".$mysqli->real_escape_string($_GET['id'])."'";
		if($mysqli->query($query)){
			echo "record deleted successfully";
			echo "<a href='display.php'>Go to display page</a>";
		}else{
			echo "Database Error: Unable to delete record.";
		}
	}
?>