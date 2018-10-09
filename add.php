<!DOCTYPE html>
<html>
<head>
	<title>MYSQLI CREATE RECORD</title>
</head>
<body>
	<?php 
		$action = isset($_POST['action'])?$_POST['action']:"";
		if($action == "create"){
			include('dbconnect.php');
			$query = "INSERT INTO student(name,address,email,mobile) VALUES (
			'".$mysqli->real_escape_string($_POST['name'])."','".$mysqli->real_escape_string($_POST['address'])."','".$mysqli->real_escape_string($_POST['email'])."','".$mysqli->real_escape_string($_POST['mobile'])."'
			)";
			//echo $query;
			if($mysqli->query($query)){
				echo "data added successfully";
			}else{
				echo "Database Error: Unable to create record.";
			}
			$mysqli->close();
		}
	?>
	<form action="#" method="post" broder="0">
		<table>
			<tr>
				<td>Name</td>
				<td><input type='text' name='name' /></td>
			</tr>
			<tr>
				<td>address</td>
				<td><input type='text' name='address' /></td>
			</tr>	
			<tr>
				<td>Email</td>
				<td><input type='text' name='email' /></td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td><input type='text' name='mobile' /></td>
			</tr>	
			<tr>
				<td></td>
				<td>
					<input type='hidden' name='action' value='create' />
					<input type='submit' value='Save' />
					<a href='display.php'>Back to index</a>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>