function isempty(x, y){
	if (!x.value.trim()){
		y.innerHTML = "<img src='img/cross.png' width='15px' height='15px'><br />This field cannot left blank!";
		return true;
	}
	else{
		y.innerHTML = "<img src='img/tick.png' width='15px' height='15px'><br />";
		return false;
	}
}
function isempty1(x, y){
	if (!x.value.trim()){
		y.innerHTML = "<img src='img/cross.png' width='15px' height='15px'><br />This field cannot left blank!";
		return true;
	}
	else{
		y.innerHTML = "";
		return false;
	}
}
function valid(w,x,y,z){
	if (isempty(w,x) || isempty(y,z)) 
		return false;
}
function credcard(w,x,y,z,c){	
	if(isNaN(w.value)||isNaN(x.value)||isNaN(y.value)||isNaN(z.value)||w.value.length<4||x.value.length<4||y.value.length<4||z.value.length<4){
		c.innerHTML="<img src='img/cross.png' width='15px' height='15px'><br />Invalid input!";
		return false;
	}
	else
		c.innerHTML="<img src='img/tick.png' width='15px' height='15px'><br />";
		return true;
}
function passwordcheck(x,y){
		if(x.value.length !=0 &&(x.value.length<8 || x.value.length>20)){
		y.innerHTML = "<img src='img/cross.png' width='15px' height='15px'><br />This field is not valid, it should be any 8 to 20 characters";
			return false;
	}
	y.innerHTML = "<img src='img/tick.png' width='15px' height='15px'><br />";
	return true;
}
function passwordcheck2(x,y){
	if (isempty(x,y))
		return false;
	else
		return passwordcheck(x,y);
}
function emailcheck(x,y){
	if (isempty(x,y))
		return false;
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!re.test(x.value)){
		y.innerHTML="<img src='img/cross.png' width='15px' height='15px'><br />Invalid email address!";
		return false;
	}
	y.innerHTML = "<img src='img/tick.png' width='15px' height='15px'><br />";
	return true;
}
function validate(x, y, z){
	if (isempty1(y,z))
		return false; 
	else{
		if (x == 'email'){
			emailcheck(y,z);
		}
		xmlHttp=null;
		if (window.XMLHttpRequest){
			xmlHttp = new XMLHttpRequest();
		}  
		else if (window.ActiveXObject){
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		if (xmlHttp != null)  {
			xmlHttp.onreadystatechange = function() {
				if (xmlHttp.readyState == 4)  {
					if (xmlHttp.status == 200)  {
						z.innerHTML = xmlHttp.responseText;						
					}
				}
			}
			xmlHttp.open("GET", "validate.php?field=" + x + "&value=" + y.value, true);
			xmlHttp.send(null);
		}
	}
}
function accheck(){
	var valid = true;
	if (isempty(username1, username2)) valid = false;
	if (isempty(email1, email2)) valid = false;
	if (!(passwordcheck2(password1,password2))) valid = false;
	if (isempty(fName1,fName2)) valid = false;
	if (isempty(lName1,lName2)) valid = false;
	if (!(credcard(c1,c2,c3,c4,cardNo))) valid = false;
	if (!(username2.innerHTML.indexOf("tick")!= -1)) valid = false;
	if (!(email2.innerHTML.indexOf("tick")!= -1)) valid = false;
	
	return valid;
}
function updateac(){
	var valid = true;
	if (!emailcheck(email,emw))
		valid = false;
	if (!credcard(cd1,cd2,cd3,cd4,cdw))
		valid = false;
	if (!passwordcheck(accpw,pww))
		valid = false;
	return valid;
	
}