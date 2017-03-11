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

	$checkInDate   =$_POST['checkindate'];
	$checkOutDate  =$_POST['checkoutdate'];
	$noOfGuest     =$_POST['noOfGuest'];
	$passportNo    =$_POST['passportNo'];
	$username      =$_POST['username'];
	$roomID        =$_POST['roomID'];
	
	$conn = new mysqli("localhost", "root", "", "hotel");
	
	$sql = "INSERT INTO booking(checkinDate, checkoutDate, noOfGuest, passportNo, username, roomID) VALUES ('".$checkInDate."','".$checkOutDate."','".$noOfGuest."','".$passportNo."','".$username."','".$roomID."')";
	if($conn->query($sql) === TRUE){
		echo "";
	}else{
		echo "Errorr: ".$sql.$conn->error;
	}
	$conn->close();
?>
<html>
<meta http-equiv="refresh" content="2;url=signout.php" />
<head>
<title>EasyHotel - Finish Booking</title>
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
			<h2 style="text-align: center; Color: White;">Thank you for choosing us!</h2>
			<h3 style="text-align: center; Color: White;">You will be signout out automatically!</h3>
		</div>
	</div>

</body>
</html>