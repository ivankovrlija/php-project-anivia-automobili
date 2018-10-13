function deactivation(){
	var answer=confirm("Da li ste sigurni da zelite da deaktivirate nalog?");

	if (answer == true) {
		return true;
	}
	else{
		return false;
	}
}
function myfunction(){
	setTimeout(function(){
		var elmnt = document.getElementById("svi_oglasi");
    	elmnt.scrollIntoView();
		document.getElementById("body").style.transitionDuration = "10s";},2000);
}