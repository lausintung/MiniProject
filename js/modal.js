function showmodal() {
	w3IncludeHTML();
	SignIn.style.display = "block";
}
function showacmodal(){
	w3IncludeHTML();
	CreateAc.style.display = "block";
}
function showbkmodal(){
	w3IncludeHTML();
	booking.style.display = "block";
}
function showupmodal(){
	w3IncludeHTML();
	account.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
function closeSignIn(){
	SignIn.style.display = "none";
}
function closeCreateAc(){
	CreateAc.style.display = "none";
}
function closeBooking(){
	booking.style.display = "none";
}
function closeUpdate(){
	account.style.display = "none";
}