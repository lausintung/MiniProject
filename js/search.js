function showResult(str) {
	if (str.length==0) { 
		document.getElementById("livesearch").innerHTML="";
		document.getElementById("livesearch").style.border="0px";
		return;
	}
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {  // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			document.getElementById("livesearch").innerHTML=this.responseText;
			document.getElementById("livesearch").style.border="1px solid #A5ACB2";
		}
	}
	xmlhttp.open("GET","livesearch.php?q="+str,true);
	xmlhttp.send();
}
function display(x){
	key.value = x.innerText;
	showResult("");
	var a = document.createElement('a');
    a.href = window.location.href;
	if (a.pathname.indexOf("result.php") >= 0)
		instantsearch();
}
function getWeekDay(x,y){
	if (x.value != 0)
		y.innerText = moment(x.value).format("dddd");
	else
		y.innerText = "";
}
function countDay(){
	if (moment(DofCO.value.toString()).diff(moment(DofCI.value), 'days') > 1)
		noDay.innerText = moment(DofCO.value.toString()).diff(moment(DofCI.value), 'days') + " Nights";
	else if (moment(DofCO.value.toString()).diff(moment(DofCI.value), 'days') == 1)
		noDay.innerText = moment(DofCO.value.toString()).diff(moment(DofCI.value), 'days') + " Night";
	else
		noDay.innerText = "Appointment cannot be made";
}
function DInChanged(){
	if (moment(DofCO.value.toString()).diff(moment(DofCI.value), 'days') < 1){
		DofCO.valueAsDate = ((moment(DofCI.value).add(2, 'days')).toDate());
		DofCO.min = DofCO.value;
	}
	getWeekDay(DofCI, inday);
	getWeekDay(DofCO, outday);
	countDay();
}
function DOutChanged(){
	getWeekDay(DofCO, outday);
	countDay();
}