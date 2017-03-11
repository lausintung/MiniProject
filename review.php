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
	$updateq="update booking set ";
	if (trim($_POST['cm']) != "")
		$updateq=$updateq."cm='".$_POST['cm']."', ";
	$updateq=$updateq."rating=".$_POST['star'].", timeforCM='".date("Y-m-d H:i:s")."' where bookingid=".$_POST['bkid'];
	$conn = mysqli_connect("localhost", "root", "","hotel");        
	if ($conn->connect_error)  {
		echo "Unable to connect to database";
		exit;
	}
	if ($conn->query($updateq) === TRUE) {
	}else {
		echo $updateq . $conn->error;
	}
		

?>
<html>
<meta http-equiv="refresh" content="2;url=index.php" />
<head>
<title>EasyHotel - Review</title>
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
			<h2 style="text-align: center; Color: White;">Thank you for taking your time for the review.<br />We love to hear about our great staff and services.</h2>
			<h3 style="text-align: center; Color: White;">You are being redirected to our home page...</h3>
		</div>
	</div>

</body>
</html>