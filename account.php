<?php
    session_start();
	$username=$_SESSION["username"];
	$fName=$_SESSION['fName'];
	$lName=$_SESSION['lName'];
	$cdstr=$_SESSION["creditcard"];
	$email=$_SESSION["email"];
    $cd = preg_split("/-/",$cdstr);
?>
<html>
<body>
<div style="width:250px; margin:0 auto;">
<h2>Update Account Information</h2>
<form id='myAcc' name="myAcc" action="updateac.php" method="post" onsubmit="return updateac()">	
	Username:<br/>
		<input type='text' style="width:200px;" value="<?php echo $_SESSION["username"] ?>" disabled><br/><br/>
		Password: (OPTIONAL)<br/> 
	</td>
	<td>	
		<input type='password' style="width:200px;" name='pw' id='accpw' onblur="passwordcheck(this,pww)"><span style='color: red; font-style: italic;' id='pww'><br></span><br/>
		First name:<br/>
	</td>
	<td>
		<input type='text' name='fname' id='fname' style="width:200px;" disabled value='<?php echo $fName ?>'><br/><br/>
		Last name:<br/>
	</td>
	<td>
		<input type='text' name='lname' style="width:200px;" id='lname' disabled value='<?php echo $lName ?>'><br/><br/>
		Credit card:<br/>
	</td>
	<td>
		<input type='text' name='cd1' onblur='credcard(cd1,cd2,cd3,cd4,cdw)' style="width:33px;" maxlength='4' id='cd1' value=<?php echo $cd[0]?>> 
		<input type='text' onblur='credcard(cd1,cd2,cd3,cd4,cdw)' name='cd2' id='cd2' style="width:33px;" maxlength='4' value=<?php echo $cd[1]?>> 
		<input type='text' onblur='credcard(cd1,cd2,cd3,cd4,cdw)' id='cd3' name='cd3' style="width:33px;" maxlength='4' value=<?php echo $cd[2]?>> 
		<input type='text' onblur='credcard(cd1,cd2,cd3,cd4,cdw)' id='cd4' name='cd4' style="width:33px;" maxlength='4' value=<?php echo $cd[3]?>>
		<span style='color: red; font-style: italic;' id='cdw'><br/></span><br/>
		Email:<br/>
		<input type='email' id='email' name='email' style="width:200px;" onblur="emailcheck(email,emw)" value=<?php echo $email ?>><span style='color: red; font-style: italic;' id='emw'><br/></span><br/>
	<input type='submit' value='Save Settings'>
</form>
</div>
</body>
</html>
