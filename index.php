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
			echo "<a href='#' onclick='showacmodal()'>Create Account</a>";
		else{
			echo "<a href='#' onclick='showupmodal()'>My Account</a>";
			echo "<a href='#' onclick='showbkmodal()'>My Booking</a>";
			echo "<a href='signout.php'>Sign Out</a>";
		}
	}	
?>
<html>
<head>
<title>EasyHotel</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/searchform.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
<link rel="stylesheet" type="text/css" href="css/rating.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

<script src="js/modal.js"></script>
<script src="js/moment.js"></script>
<script src="js/login.js"></script>
<script src="js/search.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="http://www.w3schools.com/lib/w3data.js"></script>
<script>
	$( function() {
	$( "#slider-range" ).slider({
		range: true,
		min: 1000,
		max: 3000,
		values: [ 1000, 3000 ],
		slide: function( event, ui ) {
		$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	} );
</script>
<script type="text/javascript">	
function ini(){
	<?php if (isset($_GET["signin"]) && ($_GET["signin"] == true)) echo "showmodal();"; ?>
	<?php if (isset($_GET["signup"]) && ($_GET["signup"] == true)) echo "showacmodal();"; ?>
	<?php if (isset($_GET["error"]) && ($_GET["error"] == true)) echo "showmodal();"; ?>
	<?php if (isset($_GET["acc"]) && ($_GET["acc"] == true)) echo "showupmodal();"; ?>
	<?php if (isset($_GET["rec"]) && ($_GET["rec"] == true)) echo "showbkmodal();"; ?>
	DofCI.valueAsDate = moment().toDate();
	DofCI.min = DofCI.value;
	DofCO.valueAsDate = moment().add(1, 'days').toDate();
	DofCO.min = DofCO.value;
	getWeekDay(DofCI, inday);
	getWeekDay(DofCO, outday);	
}
window.onclick = function() {
	showResult("");
}
function rvcheck(){
	var radios = review.star;
    for (var i=0, len=radios.length; i<len; i++)
        if ( radios[i].checked )
            return true; // and break out of for loop
	return false;
}
function cancel(bid){
	var r = confirm("Are you sure you want to cancel your booking? The cancelled action could not be undone!");
	if (r == true) 
		window.location.href = "cancelbooking.php?cancelbookingid=" + bid;
}	
</script>
</head>
<body onload="ini()">
	<div id="SignIn" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<span class="close" onclick="closeSignIn()">x</span>
			<h1>Sign In</h1>
			<form method="post" action="verifylogin.php">
				<span class="warning" id="warning"><?php if (isset($_GET["error"])) echo "Incorrect username or password! Please try again!"?></span>
				<label for "username">Username</label><br />
				<input type="text" name="username" id="username" onblur="isempty(this,username_warning)"> <span class="warning" id="username_warning"><br /></span><br /><br />
				<label for "password">Password</label><br />
				<input type="password" name="password" id="password" onblur="isempty(this,password_warning)"> <span class="warning" id="password_warning"><br /></span><br /><br />
				<input type="checkbox" name="keepsignedin" value = "yes"> <label for "keepsignedin">Keep me signed in</label><br /><br />
				<input type="submit" onclick="return valid(username,username_warning,password,password_warning)" value="Sign In">
				<p>Don't have an account yet?<br/><a href='#' onclick='showacmodal()'>Register</a> a new account now!</p>
			</form>
		</div>
	</div>
	<div id="CreateAc" class="modal">
		<!-- Modal content -->
		<div class="modal-content1">
			<span class="close" onclick="closeCreateAc()">x</span>
			<div w3-include-html="newac.html"></div>
		</div>
	</div>
	
	<div id="booking" class="modal">
		<!-- Modal content -->
		<div class="modal-content2">
			<span class="close" onclick="closeBooking()">x</span>
			<div w3-include-html="record.php"></div>
		</div>
	</div>	
	
	<div id="account" class="modal">
		<!-- Modal content -->
		<div class="modal-content3">
			<span class="close" onclick="closeUpdate()">x</span>
			<div w3-include-html="account.php"></div>
		</div>
	</div>		
	
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
	
	<div class="banner"style="width:1060px; height: 400px; margin:0 auto;">	
		<div style='float:left;' class="SF">
			<b>Hotel Search</b>
			<hr />
			<form name="searchForm" method="GET" action="result.php">
				<input type="text" name="key" id="key" style="width: 175px;" autocomplete="off" onkeyup="showResult(this.value)"><div class="search" id="livesearch"></div>
				<label for key>Room Type</label><br/>
				<hr />
				<label for DofCI>Check In</label><br /><input type="date" name="DofCI" id="DofCI" onchange="DInChanged()">  <span id="inday"></span><br />
				<label for DofCI>Check Out</label><br /><input type="date" name="DofCO" id="DofCO" onchange="DOutChanged()"> <span id="outday"></span><br />
				<b id="noDay">1 Night</b>
				<hr />
				<label for pp>Number of guest: </label><select name="pp" id="pp" value="1"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
				<hr />
				<label for="amount">Price range:</label>
				<input type="text" id="amount" name="amount" readonly style="background-color:#dedede; border:0; font-weight:bold;">
				<div id="slider-range"></div>
				<hr />
				<input type="submit" value="Search">
			</form>
		</div>
	</div>
	<div style='background: url("img/tbbg.jpg"); color: white; padding: 10px'>
	<h1>An Inimitable Legend of Hospitality</h1>
	<h2>Welcome to Easy Hotel!</h2>
	<p>Overlooking the spectacular Victoria Harbour, the Easy Hotel is located along Canton Road in Tsim Sha Tsui, at the heart of the city’s busiest commercial, shopping and business hub. The Star Ferry and Hong Kong’s cruise terminal are at your footstep, while shopping is right next door with the hotel forming part of Harbour City – Hong Kong’s largest shopping complex. Guests enjoy easy access to the area's major tourist attractions like Kowloon Park, Hong Kong Museum of Art, Hong Kong Space Museum and Hong Kong Cultural Centre.</p>
	<h2>A Wide Range of Package Offers</h2>
	<p>We provide a variety of rooms and suites for you to make choices. Enrich your journey to Hong Kong with the best staying experience!</p>
	<h3>Our Facilities</h3>
	<li style='float: left;'>Car Parking</li><br />
	<li style='float: left;'>24-hours Gym</li><br />
	<li style='float: left;'>Swimming Pool</li><br />
	<li style='float: left;'>Room Service</li><br />
	<li style='float: left;'>Complimentary Wifi</li><br />
	<h3>Transportation Package</h3>
	<li style='float: left;'>Airport pick up service by private car</li><br /><br />
	
	<hr />
	<h1>Easy Hotel</h1>	
	<h2>No. 3 Canton Road, Harbour City, Tsim Sha Tsui, Kowloon, Hong Kong</h2>
	</div>
	</div>
</body>
</html>