<html>
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
	if (!isset($_GET['key']) || !isset($_GET['DofCI']) || !isset($_GET['DofCO']) || !isset($_GET['amount'])){
		header("Location: index.php");
		exit;
	}
	$range = $_GET['amount'];	
	preg_match_all('!\d+!', $range, $matches);
	
	if (trim($_GET['key']))
		$key = $_GET['key'];
	$min = $matches[0][0];
	$max = $matches[0][1];
	$inD = $_GET['DofCI'];
	$outD = $_GET['DofCO'];
	$pp = $_GET['pp'];
?>
<head>
<title>EasyHotel - Room Searching</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link rel="stylesheet" type="text/css" href="css/searchform.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
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
<script src="js/search.js"></script>
<script src="js/result.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$( function() {
	$( "#slider-range" ).slider({
		range: true,
		min: 1000,
		max: 3000,
		values: [<?php echo $min ?>,<?php echo $max ?>],
		slide: function( event, ui ) {
		$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		instantsearch();
		}
	});
	$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	} );
	
	
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
var url = "search.php?"+"<?php echo "min=".$min."&max=".$max."&inD=".$inD."&outD=".$outD."&pp=".$pp."&sort=price"; if (isset($key)) echo "&key=".$key;?>";
var sortbyvalue = 'price';
function ini(){
	key.value = '<?php echo $_GET['key'];?>';
	DofCI.value = '<?php echo $inD; ?>';
	DofCI.min = moment().toISOString().substring(0, 10);
	DofCO.value = '<?php echo $outD; ?>';
	DofCO.min = moment().add(1, 'days').toISOString().substring(0, 10);
	pp.value = <?php echo $pp;?>;
	getWeekDay(DofCI, inday);
	getWeekDay(DofCO, outday);
	countDay();
}
function star() {
    $.fn.gotof();
}
window.onclick = function() {
	showResult("");
}
</script>
</head>
<body onload="search(0);ini();">
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
		<div style='float:left; height:310;'  class="SF">
			<b>Hotel Search</b>
			<hr />
			<form name="searchForm">
				<input type="text" name="key" id="key" style="width: 175px;" autocomplete="off" onchange="instantsearch()" onkeyup="showResult(this.value); instantsearch();"><div class="search" id="livesearch"></div>
				<label for key>Room Type</label><br/>
				<hr />
				<label for DofCI>Check In</label><br />
				<input type="date" name="DofCI" id="DofCI" onchange="DInChanged();instantsearch()">  <span id="inday"></span><br />
				<label for DofCI>Check Out</label><br />
				<input type="date" name="DofCO" id="DofCO" onchange="DOutChanged();instantsearch()"> <span id="outday"></span><br />
				<b id="noDay">1 Night</b>
				<hr />
				<label for pp>Number of guest: </label><select name="pp" id="pp" value="1" onchange="instantsearch()"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
				<hr />
				<label for="amount">Price range:</label>
				<input type="text" id="amount" name="amount" readonly style="background-color:#dedede; border:0; font-weight:bold;" onchange="instantsearch();">
				<div id="slider-range"></div>
				<hr />
			</form>
		</div>
		<div style='float:right'>
			<p style='background: url("img/tbbg.jpg");' id="message"></p>
		</div>
	</div>
</body>
</html>