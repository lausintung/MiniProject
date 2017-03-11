<?php
	session_start();
	
	if ((!isset($_SESSION["username"])) && (isset($_COOKIE["username"]))){
		$_SESSION["username"] = $_COOKIE["username"];
		setcookie("username", $_SESSION["username"], time()+30*24*60*60);
	}
	$loggedin = isset($_SESSION["username"]);
	
	function dropbtn($loggedin){
		if (!($loggedin)) 
			echo "<a href='#' class='dropbtn' onclick='showmodal()'>Sign In</a>";
		else
			echo "<a href='#' class='dropbtn'>Hi, ".$_SESSION['fName']."</a>";
	}
	function dropdown($loggedin){
		if (!($loggedin)) 
			echo "<a href='index.php?signup=true'>Create Account</a>";
		else{
			echo "<a href='index.php?acc=true' >My Account</a>";
			echo "<a href='index.php?rec=true' >My Booking</a>";
			echo "<a href='signout.php'>Sign Out</a>";
		}
	}	

?>   
<?php
	$un = $_POST['username1'];
	$pw = $_POST['password1'];
	$fName = $_POST['fName1'];
	$lName = $_POST['lName1'];
	$email = $_POST['email1'];
	$cardNo = $_POST['c1']."-".$_POST['c2']."-".$_POST['c3']."-".$_POST['c4'];
	
	$conn = mysqli_connect("localhost", "root", "","hotel");
	
	if (!$conn)  { 
		exit("Unable to connect to database");
	}
	
	$sql = "INSERT INTO user (username, fName, lName, pwd, creditcard, email) VALUES ('".$un."', '".$fName."', '".$lName."', '".$pw."', '".$cardNo."', '".$email."' )";
	
	if($conn->query($sql) === TRUE){
		$_SESSION["username"] = $un;
		$_SESSION["fName"] = $fName;
		$_SESSION["lName"] = $lName;
		$_SESSION["email"] = $email;
		$_SESSION["creditcard"] = $cardNo;
	}else{
		echo "Errorr: ".$sql.$conn->error;
	}
	$conn->close();
?>
<html>
<meta http-equiv="refresh" content="2;url=<?php echo $_SERVER['HTTP_REFERER']?>" />
<head>
<title>Booking Cancelled</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>

<body>
	<div style="width:1060px; margin:0 auto;">
		<ul>
		<li style="float: left; Color: White; Font-Size: 40px; text-align: middle;"><a style='padding: 0 0 0 10px;' href='index.php')">EasyHotel</a></li>
		<li class="dropdown">
			<?php dropbtn($loggedin) ?>
			<div class="dropdown-content" id="myDropdown">
				<?php dropdown($loggedin) ?>
			</div>
		</li>
		</ul>		
		<div>
			<h2 style="text-align: center; Color: White;">Account created successfully!</h2>
			<h3 style="text-align: center; Color: White;">You are being redirected...</h3>
		</div>
	</div>

</body>
</html>