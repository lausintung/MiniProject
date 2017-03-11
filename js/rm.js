function display(){
	dpn = price[now];
	if (bf.checked)
		dpn = dpn + 100;
	if (tp.checked)
		dpn = dpn + 100;
	ttd = nights*dpn;
	pernight.innerText = dpn;
	total.innerText = ttd;
	
	rid.value 	= roomid[now];
	rp.value 	= price[now];
	ttp.value 	= ttd;	
}
function breakfast(){
	if (bf.checked){
		bfd.innerText = '-';
		bff.value = true;
		display();
	}else{
		bfd.innerText = '+';
		bff.value = false
		display();
	}
}
function transport(){
	if (tp.checked){
		tpd.innerText = '-';
		tpp.value = true;
		display();
	}else{
		tpd.innerText = '+';
		tpp.value = false;
		display();
	}
}	
function view(){
	if (now)
		now = 0;
	else 
		now = 1;
	dsp.innerText = description[now];
	hd.innerText = price[now];
	if (gd.checked){
		vi.value = "Garden";
		hbd.innerText = " (+HKD150)";
		gdd.innerText = "";
	}
	else{
		vi.value = "Harbour";
		gdd.innerText = " (-HKD150)";
		hbd.innerText = "";
	}
	display();
}
function star() {
    $.fn.gotof();
}