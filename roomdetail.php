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
?>
<?php
	$name = $_GET['name'];
	$roomid = $_GET['roomid'];
	$inD=$_GET['inD'];
	$outD=$_GET['outD'];
	$pp=$_GET['pp'];
?>
<?php
	$conn = mysqli_connect("localhost", "root", "","hotel");
	if (!$conn)  { 
		exit("Unable to connect to database");
	}
	$query = "	SELECT * FROM room WHERE roomID = '".$roomid."';";
	$result = $conn->query($query);
	if (!$result)  die ("failed");
	else {
		$result->data_seek(0);
		while ($row = $result->fetch_assoc())  {
				$dbroomID[0]=$row['roomID'];
				$dbname=$row['name'];
				$dbprice[0]=$row['price'];
				$dbphoto=$row['photo'];
				$dbdescription[0]=$row['description'];
				$dbnoOfGuest=$row['noOfGuest'];
			}
		$ratingq = "Select avg(rating) from booking LEFT JOIN room on room.roomID=booking.roomID where name = '".$name."' group by name";
		$resultr = $conn->query($ratingq);
		if (!$resultr)  die ($ratingq);
		else {
			$resultr->data_seek(0);
			while ($row = $resultr->fetch_assoc())  
				if($row['avg(rating)']!=null)
					$rating=$row['avg(rating)'];
				else
					$rating=0;
		}
		$resultr->free();
	}
	$result->free();
	if (strpos($dbdescription[0], 'harbour') !== false) 
		$def = 0; 
	else 
		$def = 1;
	if (strpos($name, 'Deluxe') !== false){
		if (strpos($dbdescription[0], 'harbour') !== false)
			$query = "	SELECT * 
						FROM room 
						LEFT JOIN (
							Select booking.roomid
							FROM room
							INNER JOIN booking 
							ON room.roomID = booking.roomID
							WHERE ('".$inD."' >= checkindate  AND '".$inD."' < checkoutdate)
							OR ('".$outD."' > checkindate AND '".$outD."' <= checkoutdate)
						)a 
						ON a.roomid = room.roomid
						WHERE a.roomid is NULL
						AND name = '".$name."' AND description LIKE '%garden%' GROUP BY name;";
		else
			$query = "	SELECT * 
						FROM room 
						LEFT JOIN (
							Select booking.roomid
							FROM room
							INNER JOIN booking 
							ON room.roomID = booking.roomID
							WHERE ('".$inD."' >= checkindate  AND '".$inD."' < checkoutdate)
							OR ('".$outD."' > checkindate AND '".$outD."' <= checkoutdate)
						)a 
						ON a.roomid = room.roomid
						WHERE a.roomid is NULL
						AND name = '".$name."' AND description LIKE '%harbour%' GROUP BY name;";
		$result = $conn->query($query);
		if (!$result)  die ($query);
		else {
			$result->data_seek(0);
			if(mysqli_num_rows($result)>0){
				while ($row = $result->fetch_assoc())  {
					$dbroomID[1]=$row['roomID'];
					$dbprice[1]=$row['price'];
					$dbdescription[1]=$row['description'];
					$nofound = 0;
				}
			}
			else $nofound = 1;
			$result->free();
		}
	}
	else $nofound = 1;
?>
<html>
<title>EasyHotel - Room Reservation</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<style type="text/css">
tr{
	border-bottom: 1px solid white;
}
span.stars, span.stars span {
    display: block;
    background: url(img/stars.png) 0 -16px repeat-x;
    width: 80px;
    height: 16px;
}

span.stars span {
    background-position: 0 0;
}
</style>
<script src="js/moment.js"></script>
<script src="js/rm.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
$.fn.stars = function() {
    return $(this).each(function() {
        // Get the value

        var val = parseFloat($(this).html());
		val = Math.round(val * 4) / 4; /* To round to nearest quarter */
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
		
        $(this).html($span);
    });
}

$.fn.gotof =(function() {
    $('span.stars').stars();
});
</script>
<script type="text/javascript">
var def = <?php echo $def;?>;
var oview = <?php echo $nofound; ?>;
var idate = moment('<?php echo $inD?>');
var odate = moment('<?php echo $outD?>');
var nights = odate.diff(idate, 'days');
var roomid = [<?php echo $roomid; if (!$nofound) echo",".$dbroomID[1]?>];
var price = [<?php echo $dbprice[0]; if (!$nofound) echo",".$dbprice[1]?>];
var description = ['<?php echo $dbdescription[0]; if (!$nofound) echo"','".$dbdescription[1]?>'];
var now = 0;
var ttd;
var dpn;
function conti(){
	booking.submit();
}
function ini(){
	night.innerText = nights;
	dpn = price[0];
	hd.innerText = dpn;
	display();
	dsp.innerText = description[0];
	if (def){
		gd.checked = true;
		vi.value = 'Garden';
		hbd.innerText = " (+HKD150)";
		if (oview)
			hb.disabled = true;
	}
	else{
		hb.checked = true;
		vi.value = 'Harbour';
		gdd.innerText = " (-HKD150)";
		if (oview)
			gd.disabled = true;
	}
	star();
	<?php if (isset($_GET["error"]) && ($_GET["error"] == true)) echo "showmodal();"; ?>
	<?php if (isset($_GET["signin"]) && ($_GET["signin"] == true)) echo "showmodal();"; ?>
	rname.value	= '<?php echo $name?>';
	rid.value 	= roomid[now];
	inD.value 	= idate;
	outD.value 	= odate;
	pp.value 	= <?php echo $pp?>;
	bff.value 	= false;
	tpp.value 	= false;
	rp.value 	= price[now];
	ttp.value 	= ttd;
	nt.value 	= nights;
}
</script>
<body onload='ini()'>
	<form name="booking" id="booking" action="booking.php" method="post" hidden>
		<input name="rid" 	 id="rid"     >
		<input name="inD"    id="inD"     >
		<input name="outD"   id="outD"    >
		<input name="pp"     id="pp"      >
		<input name="bff"    id="bff"     >
		<input name="tpp"    id="tpp"     >
		<input name="rp"     id="rp"      >
		<input name="ttp"    id="ttp"     >
		<input name="nt"  	 id="nt"      >
		<input name="rname"	 id="rname"	  >
		<input name="vi"	 id="vi"	  >
	</form>
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
	</div>
	<div style="width:1060px; margin:0 auto;">
	<p style='background: url("img/tbbg.jpg");'>
	<table style='color:white; border-top: 1px solid white;  border-collapse: collapse;'><col width='200px'><col width='500px'><col width='360px'>
		<tr>
			<th colspan="2"><h1 style='text-align: left; margin: 0 0 0 5px;'><?php echo $name?></h1></th><th><h1 style='text-align: Right; margin: 0 5px 0;'>HKD<span id='hd'></span></h1></th>
		</tr>
		<tr>
			<td colspan="2"><img width='700px' src='img/photos/<?php echo $dbphoto?>'></td>
			<td style='vertical-align: top;'><p id='dsp' style='padding: 20px 5px 10px 5px;'></p>
			<h4 style='padding: 0 0 0 5px; margin:0 0 0 5px;'>Room Capacity: <?php echo $dbnoOfGuest;?></h4><hr  />
			<h3 style='padding: 0 5px 0 5px;text-align: right;'>Check-in Date: <?php echo $inD;?><br />Check-out Date: <?php echo $outD;?></h3>
			<h3 style='padding: 0 5px 0 5px;text-align: right;'>Number of Guest: <?php echo $pp?></h3>
			<h4 style='text-align: left; padding: 0 5px 0 5px; margin: 0 0 0 0;'>View: <input type='radio' name='view' id='gd' value='garden' onchange='view()'>Garden<span id='gdd'></span> <input type='radio' name='view' id='hb' value='harbour' onchange='view()'>Harbour<span id='hbd'></span></h4>
			<div style='float: left;'><h4 style='text-align: left; padding: 0 5px 0 5px;'>Breakfast (<span id='bfd'>+</span>HKD100): <input type='checkbox' id='bf' onchange='breakfast()'><br />Transportation: (<span id='tpd'>+</span>HKD100): <input type='checkbox' id='tp' onchange='transport()'></h4></div>
			<div style='float: right;'><h3 style='text-align: right; padding: 0 5px 0 5px;'>HKD<span id='pernight'></span><br /> x <span id="night"></span> Nights</h3></div><div style='text-align: right; clear: left;'><hr />
			<h2 style='text-align: right; padding: 0 5px 0 5px;'>Total: HKD<span id='total'></span></h2></div>
			<button style='float: left; font-size: 25px ;margin: 0 0 0 10px;' onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER']?>'">Back</button>
			<button style='float: right; font-size: 25px ;margin: 0 10px;' onclick="conti()">Continue</button>
		</tr>
			<td colspan="2"><h1 style='text-align: left; margin: 0 0 0 5px;'>Room Review</h1></td><td><div style='float: Right; margin: 0 5px 0;'><span class='stars'><?php echo $rating?></span></div></td>
		<tr>
		<tr>
			<td style='border-right: 1px solid white;'><h2 style='text-align: left; margin: 0 5px 0;' >User</h2></td>
			<td colspan="2"><h2 style='text-align: left; margin: 0 5px 0;'>Comment</h2></td>
		</tr>
		
		<?php 	$crq ="Select username, cm , rating, timeforCM from booking LEFT JOIN room on room.roomID=booking.roomID where name = '".$name."' and rating is not NULL ORDER By timeforCM desc ";
				$cmr = $conn->query($crq);
				if (!$cmr)  die ($crq);
				else {
					$cmr->data_seek(0);
					if(mysqli_num_rows($cmr)>0){
						while ($row = $cmr->fetch_assoc())  {
							echo "
		<tr>
			<td style='border-right: 1px solid white;'valign= 'top'><h4 style='text-align: left; margin: 5px 5px 0;'>".$row['username']."</h4></td><td><p style='text-align: left; margin: 0 5px 0;'>".$row['cm']."</p><br /><p style='text-align: left; margin: 5px 5px 5px;'><span class='stars'>".$row['rating']."</span></p></td><td valign='bottom'><p style='text-align: right ; margin: 0 5px 5px;'>Submitted on ".$row['timeforCM']."</p></td>
		</tr>";
						}
						$cmr->free();
					}
					else{
						echo "
		<tr>
			<td colspan='3'><h3 style='text-align: center; margin: 5px 5px 5px;'>No review available at this room</h3></td>
		</tr>";
					}
				}
		
		?>
		
	</table>
	</p>
	</div>
</body>
</html>
	