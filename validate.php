<?php
	$value = $_GET['value'];
	$field = $_GET['field'];
	$conn = mysqli_connect("localhost", "root", "","hotel");
	if (!$conn)  { 
		exit("Unable to connect to database");
	}
	if($field == "username")
		$sql = "SELECT username FROM user WHERE username ='".$value."'";
	else if($field == "email")
		$sql = "SELECT username FROM user WHERE email ='".$value."'";
	
	$result = $conn->query($sql);
	if (!$result)  die ($sql);
	else {
		$result->data_seek(0);
		if(mysqli_num_rows($result)>0){
			echo "<img src='img/cross.png' width='15px' height='15px'><br />This has already been used!";
		}
		else{
			echo "<img src='img/tick.png' width='15px' height='15px'><br />";
		}
	}	
	$result->free();
	$conn->close();
?>