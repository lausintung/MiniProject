<?php
	if (isset($_GET['booking']))
		$book=true;
	if (isset($_SESSION["username"]))
		header("Location: index.php");
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$conn = mysqli_connect("localhost", "root", "","hotel");
	if (!$conn)  { //if (mysqli_connect_errno()) <--working   if ($conn->connect_error) <--notworking
		exit("Unable to connect to database");
	}
	else{
 
		$query = "select * from user where username = '".$username."' and pwd = '".$password."'";
		$result = $conn->query($query);
	
		if(mysqli_num_rows($result) == 0){
			$result->free();
			$conn->close();
			if ($book)
				header('Location: booking.php?error=true');
			else
				header("Location: index.php?error=true");
		}
		else {
			$result->data_seek(0);
			$j = 0;
			while ($row = $result->fetch_assoc())  {
				session_start();
				$_SESSION["username"] = $row["username"];
				$_SESSION["fName"] = $row["fName"];
				$_SESSION["lName"] = $row["lName"];
				$_SESSION["creditcard"] = $row["creditcard"];
				$_SESSION["email"] = $row["email"];
				if (isset($_POST["keepsignedin"]) && $_POST["keepsignedin"] == "yes")
					setcookie("username", $username, time()+30*24*60*60);
			}
			$result->free();
			$conn->close();
			if ($book)
				header("Location: booking.php");
			else
				header("Location: index.php");
		}   
	}
?>