<?php
	session_start();
	if ((!isset($_SESSION["username"])) && (isset($_COOKIE["username"]))){
		$_SESSION["username"] = $_COOKIE["username"];
		setcookie("username", $_SESSION["username"], time()+30*24*60*60);
	}
	$loggedin = isset($_SESSION["username"]);
	
	function dropbtn($loggedin){
		if (!($loggedin)) 
			echo "<a href='index.php?signin=true' class='dropbtn'>Sign In</a>";
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
	$roomid = $_SESSION["rid"] ;
	$inD 	= $_SESSION["inD"] ;
	$CinD	= date_create($inD);
	$outD   = $_SESSION["outD"];
	$CoutD	= date_create($outD);
	$pp     = $_SESSION["pp"]  ;
	$bf     = $_SESSION["bff"] ;
	$tp     = $_SESSION["tpp"] ;
	$roomP  = $_SESSION["rp"]  ;
	$totalP = $_SESSION["ttp"] ;
	$night  = $_SESSION["nt"]  ;
	$view	= $_SESSION["view"];
	$rname  = $_SESSION["rname"];
	$dpn	= $roomP;
	if ($bf)
		$dpn=$dpn+100;
	if ($tp)
		$dpn=$dpn+100;
	
	$username = $_SESSION['username'];
	
	$fName  = $_POST['firstName1'];
	$LName  = $_POST['lastName1'] ;
	$email  = $_POST['email1']    ;
	$c1     = $_POST['c1']        ;
	$c2     = $_POST['c2']        ;
	$c3     = $_POST['c3']        ;
	$c4     = $_POST['c4']        ;
    $exDM   = $_POST['exD1']      ;
	$exDY   = $_POST['exD2']      ;
	$passp  = strtoupper($_POST['ppNo1']);
	$card	= $c1.'-'.$c2.'-'.$c3.'-'.$c4;
	$exD	= $exDM.'/'.$exDY;
?>   
<html>
<head>
<title>EasyHotel - Booking Confirmation</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<style type="text/css">
tr{
	border-bottom: 1px solid white;
}
</style>
<script type='text/javascript'>
function book(){
	if (confirm("Confirm your booking?"))
		bookForm.submit();	
}
</script>
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

		<form id='bookForm' method="POST" action="makebook.php" hidden>
			<input name='checkindate' value='<?php echo date_format($CinD,"Y-m-d")?>'>
			<input name='checkoutdate' value='<?php echo date_format($CoutD,"Y-m-d")?>'>
			<input name='noOfGuest' value=<?php echo $pp?>>
			<input name='passportNo' value='<?php echo $passp?>'>
			<input name='username' value='<?php echo $username?>'>
			<input name='roomID' value=<?php echo $roomid ?>>
		</form>
		<div style="width:600px; margin:0 auto;">
		<p style='background: url("img/tbbg.jpg");'>
		<table style='color:white; border-top: 1px solid white;  border-collapse: collapse;'><col width='250px'><col width='350px'>
			<tr>
				<th colspan='2'><h1 style='text-align: center; margin: 0 0 0 5px;'>Confirm booking</h1></th>
			</tr>
			<tr>
				<td colspan='2'><h3 style='text-align: center; margin: 0 0 0 5px;'>Booking Information</h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Room Type:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $rname.' ('.$view.' view)'?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Room Number:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $roomid?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Room Price:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo "HKD".$roomP?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>No of Guest:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $pp?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Breakfast(+HKD100):</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php if($bf) echo "Yes"; else echo "No";?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Transportation(+HKD100):</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php if($tp) echo "Yes"; else echo "No";?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>SubTotal:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo "HKD".$dpn?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Check-In Date:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo date_format($CinD,"Y-m-d");?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Check-Out Date:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo date_format($CoutD,"Y-m-d")?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Duration: </h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $night." Night(s)"?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Total: </h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo "HKD".$totalP?></h3></td>
			</tr>
			<tr>
				<td colspan='2'><h3 style='text-align: center; margin: 0 0 0 5px;'>Payment Information</h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Cardholder First Name:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $fName?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Cardholder Last Name:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $LName?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Email:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $email?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Card Number:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $card?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Expiry Date:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $exD?></h3></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Passport Number:</h3></td>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'><?php echo $passp?></h3></td>
			</tr>
			<tr  valign="middle" height="50px">
				<td colspan='2' align="center"><button onclick="book()">Confirm</button> <button onclick="window.location.href='stopservice.php'">Cancel</button></div></td>
			</tr>
		</table>  	
	</div> 
	</div> 
</body>
</html>