<?php 
   session_start();

   if ((!isset($_SESSION["username"])) && (isset($_COOKIE["username"]))){
      $_SESSION["username"] = $_COOKIE["username"];
      setcookie("username", $_SESSION["username"], time()+30*24*60*60);
   }
   $loggedin = isset($_SESSION["username"]);
?>
<?php
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


   $conn = mysqli_connect("localhost", "root", "","hotel");
   if ($conn->connect_error)  {
   echo "Unable to connect to database";
      exit;
   }

   $query = 'delete from booking where bookingid='.$_GET['cancelbookingid'];
   $result = $conn->query($query);
   $conn->close();



?>

<html>
<meta http-equiv="refresh" content="3;url=index.php" />
<head>
<title>EasyHotel - Booking Cancelled</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>

<body>
	<div style="width:1060px; margin:0 auto;">
		<ul>
		<li style="float: left; Color: White; Font-Size: 40px; text-align: middle;"><a href='index.php')">EasyHotel</a></li>
		<li class="dropdown">
			<?php dropbtn($loggedin) ?>
			<div class="dropdown-content" id="myDropdown">
				<?php dropdown($loggedin) ?>
			</div>
		</li>
		</ul>		
		<div>
			<h2 style="text-align: center; Color: White;">Your booking (ID:<?php echo $_GET['cancelbookingid'];?>) is cancelled successfully!</h2>
			<h3 style="text-align: center; Color: White;">You are being redirected to our home page...</h3>
		</div>
	</div>

</body>
</html>
