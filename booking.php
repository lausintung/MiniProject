<?php	
	session_start();
	if ((!isset($_SESSION["username"])) && (isset($_COOKIE["username"]))){
		$_SESSION["username"] = $_COOKIE["username"];
		setcookie("username", $_SESSION["username"], time()+30*24*60*60);
	}
	$loggedin = isset($_SESSION["username"]);
	function dropbtn($loggedin){
		if (!($loggedin)) 
			echo "<a href='#' onclick='showmodal()' class='dropbtn'>Sign In</a>";
		else
			echo "<a href='#' class='dropbtn'>Hi, ".$_SESSION['fName']."</a>";
	}
	function dropdown($loggedin){
		if (!($loggedin)) 
			echo "<a href='#' onclick='showacmodal()'>Create Account</a>";
		else{
			echo "<a href='index.php?acc=true' >My Account</a>";
			echo "<a href='index.php?rec=true' >My Booking</a>";
			echo "<a href='signout.php'>Sign Out</a>";
		}
	}	
	if (isset($_POST['rname'])){
		$_SESSION['rname']=		$_POST['rname'] ;
		$_SESSION["rid"]  =     $_POST["rid"]   ;
		$_SESSION["inD"]  =     $_POST["inD"]   ;
		$_SESSION["outD"] =     $_POST["outD"]  ;
		$_SESSION["pp"]   =     $_POST["pp"]    ;
		$_SESSION["bff"]  =     $_POST["bff"]   ;
		$_SESSION["tpp"]  =     $_POST["tpp"]   ;
		$_SESSION["rp"]   =     $_POST["rp"]    ;
		$_SESSION["ttp"]  =     $_POST["ttp"]   ;
		$_SESSION["nt"]   =     $_POST["nt"]    ;
		$_SESSION["view"] =		$_POST["vi"]	;	
	}
?>
<html>
<html>
<head>
<title>EasyHotel - Booking</title>
<link rel="stylesheet" type="text/css" href="css/navbar.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<style type="text/css">
tr{
	border-bottom: 1px solid white;
}
</style>
<script src="js/modal.js"></script>
<script src="js/login.js"></script>
<script src="js/moment.js"></script>
<script src="http://www.w3schools.com/lib/w3data.js"></script>
<script type="text/javascript">
function passportcheck(x,y){
	if (isempty(x,y))
		return false;
	var pp = /^\D{1}\d{8}$/;
	if(!pp.test(x.value)){
		y.innerHTML="<img src='img/cross.png' width='15px' height='15px'><br />Invalid Passport Number!";
		return false;
	}
	y.innerHTML= "<img src='img/tick.png' width='15px' height='15px'><br />";
	return true;	
}
function checkexpd(x,y,z){
	if (isempty(x,z)||isempty(y,z))
		return false;
	else if (x.value.length < 2||y.value.length < 2||x.value > 12||x.value < 1){
		z.innerHTML="<img src='img/cross.png' width='15px' height='15px'><br />Invalid Input!";
		return false;
	}else{
		var M = moment().format("MM");
		var Y = moment().format("YY");
		if(y.value > Y && y.value <= (parseInt(Y)+20)){			
			z.innerHTML= "<img src='img/tick.png' width='15px' height='15px'><br />";
			return true;
		}else if (y.value == Y){
			if (M > x.value){
				z.innerHTML="<img src='img/cross.png' width='15px' height='15px'><br />Invalid Input!";
				return false;
			}
			z.innerHTML= "<img src='img/tick.png' width='15px' height='15px'><br />";
			return true;
		}
		z.innerHTML="<img src='img/cross.png' width='15px' height='15px'><br />Invalid Input!";
		return false;
	}
	
}
function conti(){
	if (!<?php if ($loggedin) echo "true"; else echo "false";?>){
		showmodal();
		warning.innerText = "Please sign in to continue!";
		return false;
	}
	else{
		var check = true;
		if (isempty(firstName1, firstName2)) 
			check = false;
		if (isempty(lastName1,lastName2))
			check = false;
		if (!emailcheck(email1,email2))
			check = false;
		if (!credcard(c1,c2,c3,c4,cardNo))
			check = false;
		if (!passportcheck(ppNo1,ppno2))
			check = false;
		if (!checkexpd(exD1,exD2,exD))
			check = false;
		return check;		
	}
}
function ini(){	
	if (<?php if ($loggedin) echo "true"; else echo "false";?>){
		firstName1.value = '<?php if ($loggedin) echo $_SESSION['fName']?>';
		lastName1.value = '<?php if ($loggedin) echo $_SESSION['lName']?>';
		email1.value = '<?php if ($loggedin) echo $_SESSION['email']?>';
		<?php if ($loggedin) $cd = preg_split("/-/",$_SESSION['creditcard']);?>
		
		c1.value = '<?php if ($loggedin) echo $cd[0]?>';
		c2.value = '<?php if ($loggedin) echo $cd[1]?>';
		c3.value = '<?php if ($loggedin) echo $cd[2]?>';
		c4.value = '<?php if ($loggedin) echo $cd[3]?>';		
	}
	else {
		showmodal();
		<?php if (!isset($_GET['error'])) echo 'warning.innerText = "Please sign in to continue!";';?>
	}
}
</script>
</head>
<body onload='ini()'>
	<div id="SignIn" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<span class="close" onclick="closeSignIn()">x</span>
			<h1>Sign In</h1>
			<form method="post" action="verifylogin.php?booking=true">
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
	<div style="width:600px; margin:0 auto;">
	<form id='bookForm' method="POST" action='Confirm.php'>
		<p style='background: url("img/tbbg.jpg");'>
		<table style='color:white; border-top: 1px solid white;  border-collapse: collapse;'><col width='250px'><col width='350px'>
			<tr><th colspan='2'><h1 style='text-align: center; margin: 0 0 0 5px;'>Booking</h1></th></tr>
			<tr style='border-buttom: 1px solid white;'><td colspan='2'><h2 style='text-align: center; margin: 0 0 0 5px;'>Please fill in the following information</h3></td>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Cardholder First Name:</h3></td>
				<td><input type='text' id='firstName1' name='firstName1' style="width:300px;" onblur='isempty(firstName1, firstName2)'><span id='firstName2' class='warning'></span></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Cardholder Last Name:</h3></td>
				<td><input type='text' id='lastName1' name='lastName1' style="width:300px;" onblur='isempty(lastName1,lastName2)'><span id='lastName2' class='warning'></span></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Email:</h3></td>
				<td><input type='text' id='email1'  name='email1' style="width:300px;" onblur="emailcheck(email1,email2)"><span id='email2' class='warning'></span></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Card Number:</h3></td>
				<td><input id='c1' name='c1' type='text' maxlength='4' onblur='credcard(c1,c2,c3,c4,cardNo)' size='4'>-<input id='c2' name='c2' type='text' onblur='credcard(c1,c2,c3,c4,cardNo)' size='4' maxlength='4'>-<input id='c3' name='c3' size='4' type='text' onblur='credcard(c1,c2,c3,c4,cardNo)' maxlength='4'>-<input id='c4' name='c4' size='4' type='text' maxlength='4' onblur='credcard(c1,c2,c3,c4,cardNo)'><span id='cardNo' class='warning'></span></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Expiry Date:</h3></td>
				<td><input type='text' id='exD1' name='exD1' size='2' style="width:30px;"  maxlength="2" onblur="checkexpd(exD1,exD2,exD)"> / <input type='text' style="width:30px;" id='exD2' name='exD2' size='2' maxlength="2" onblur="checkexpd(exD1,exD2,exD)"> MM/YY <span id='exD' class='warning'></span></td>
			</tr>
			<tr>
				<td><h3 style='text-align: left; margin: 5px 0 5px 5px;'>Passport Number:</h3></td>
				<td><input type='text' id='ppNo1' name='ppNo1' style="width:300px;" onblur="passportcheck(ppNo1,ppno2)"><span id='ppno2' class='warning'></span></td>
			</tr>
			<tr  valign="middle" height="50px">
				<td colspan='2' align="center"><span id='error'></span><br><input type='submit' value="Book Now!" id='book' onclick='return conti()'> <input type='reset'></div></td>
			</tr>
		</table>    
    </form>
	</div>
</body>
</html>