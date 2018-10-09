<?php
include "dbconnect.php";
$action = isset($_POST['action'])?$_POST['action']:"";
if($action =="update"){
	$query = "update student set name='".$mysqli->real_escape_string($_POST['name'])."',
	address='".$mysqli->real_escape_string($_POST['address'])."',
	mobile='".$mysqli->real_escape_string($_POST['mobile'])."',
	email='".$mysqli->real_escape_string($_POST['email'])."' where id='".$mysqli->real_escape_string($_REQUEST['id'])."'";
	if($mysqli->query($query)){
		echo "updated successfully";
	}else{
		echo "Database Error: Unable to update record.";
	}
} 
$select = "select id,name,mobile,email,address from student where id='".$mysqli->real_escape_string($_REQUEST['id'])."'limit 0,1";
	$result = $mysqli->query($select);
	$row    = $result->fetch_assoc();
	$id     = $row['id'];
	$name   = $row['name'];
	$mobile = $row['mobile'];
	$email  = $row['email'];
	$address= $row['address'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Record</title>
</head>
<body>
<form action="#" method="post" border="0">
	<table>
		<tr>
			<td>Name</td>
			<td><input type='text' name='name' value='<?php echo $name;  ?>' /></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type='text' name='address' value='<?php echo $address;  ?>' /></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type='text' name='email'  value='<?php echo $email;  ?>' /></td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td><input type='text' name='mobile'  value='<?php echo $mobile;  ?>' /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<!-- so that we could identify what record is to be updated -->
				<input type='hidden' name='id' value='<?php echo $id ?>' />
				<input type='hidden' name='action' value='update' />
				<input type='submit' value='Edit' />
				<a href='display.php'>Back to display page</a>
			</td>
		</tr>
	</table>
</form>
</body>
</html>