<!DOCTYPE html>
<html>
<head>
	<title>Read Record</title>
</head>
<body>
<?php 
include('dbconnect.php');
$query = "select * from student";
$result = $mysqli->query($query);
$num_result = $result->num_rows;
echo "<div><a href='add.php'>Add Record</div>";
if($num_result>0){
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Name</th>";
	echo "<th>Address</th>";
	echo "<th>Email</th>";
	echo "<th>Mobile</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	while($row = $result->fetch_assoc()){
		extract($row);
		echo "<tr>";
		echo "<td>{$name}</td>";
		echo "<td>{$address}</td>";
		echo "<td>{$email}</td>";
		echo "<td>{$mobile}</td>";
		echo "<td><a href='edit.php?id={$id}'>Edit</a>/<a href='#' onclick='delete_user( {$id} );'>Delete</a></td>";
		echo "</tr>";
	}
	echo "</table>";
}else{
	echo "No record found";
}
$result->free();
$mysqli->close();
?>
</body>
<script type='text/javascript'>
function delete_user( id ){
	//prompt the user
	var answer = confirm('Are you sure?');
	if ( answer ){ //if user clicked ok
		//redirect to url with action as delete and id of the record to be deleted
		window.location = 'delete.php?action=delete&id=' + id;
	} 
}
</script>
</html>