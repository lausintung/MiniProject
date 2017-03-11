function instantsearch(){
	var num = amount.value.match(/(\d[\d\.]*)/g);
	var min = num[0];
	var max = num[1];
	var sortby = document.getElementById("sort");
	var sortby1 = document.getElementById("sort1");
	url = "search.php?inD="+DofCI.value+"&outD="+DofCO.value+"&pp="+pp.value+"&min="+min+"&max="+max;
	if (key.value.trim())
		url = url + "&key="+key.value;
	if (sortby != null && sortby1 != null){		
		if (sortbyvalue != sortby.value)
			sortbyvalue = sortby.value;
		else if (sortbyvalue != sortby1.value)
			sortbyvalue = sortby1.value;
	}
	url = url + "&sort="+sortbyvalue;
	search();
}
function search()  {
	xmlHttp=null;
	if (window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}  
	else if (window.ActiveXObject){
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (xmlHttp != null)  {
		xmlHttp.onreadystatechange = stateChange;
		xmlHttp.open("GET", url, true);
		xmlHttp.send(null);
	}
}
	
function stateChange()  {
	if (xmlHttp.readyState == 4)  {
		if (xmlHttp.status == 200)  {
			message.innerHTML = xmlHttp.responseText;
			star();
		}
	}
}