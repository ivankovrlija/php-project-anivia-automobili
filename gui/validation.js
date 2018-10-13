function check(fieldName){
            field=document.getElementById(fieldName);
            fielderr=document.getElementById(fieldName + "error");
            error="";
            if (field.value=="") {
                fielderr.innerHTML=" * obavezno polje";
                fielderr.style.color="#D30000";
                fielderr.style.fontWeight="bold";
            }
            else{
                fielderr.innerHTML=error;
            }
        }
function validateForm() {
    var name = document.getElementById("name").value;
    var lastname = document.getElementById("lastname").value;
    var username = document.getElementById("username").value;
    var mail = document.getElementById("mail").value;
    var pass = document.getElementById("pass").value;
    var nameerr = document.getElementById("nameerror");
    var lastnameerr = document.getElementById("lastnameerror");
    var usernameerr = document.getElementById("usernameerror");
    var mailerr = document.getElementById("mailerror");
    var passerr = document.getElementById("passerror");
    var nameLength= name.length;
    var lastnameLength= lastname.length;
    var usernameLength= username.length;
    var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    isValid=true;
    if (name == "") {
    	nameerr.innerHTML=" * obavezno polje";
		nameerr.style.color="#D30000";
		nameerr.style.fontWeight="bold";
        isValid=false;
    }
    if (lastname == "") {
    	lastnameerr.innerHTML=" * obavezno polje";
		lastnameerr.style.color="#D30000";
		lastnameerr.style.fontWeight="bold";
        isValid=false;
    }
     if (username == "") {
    	usernameerr.innerHTML=" * obavezno polje";
		usernameerr.style.color="#D30000";
		usernameerr.style.fontWeight="bold";
        isValid=false;
    }
     if (mail == "") {
    	mailerr.innerHTML=" * obavezno polje";
		mailerr.style.color="#D30000";
		mailerr.style.fontWeight="bold";
        isValid=false;
    }
    if (pass == "") {
    	passerr.innerHTML=" * obavezno polje";
		passerr.style.color="#D30000";
		passerr.style.fontWeight="bold";
        isValid=false;
    }
    if (nameLength < 3 && name!== "") {
    	nameerr.innerHTML=" * prekratko ime";
    	nameerr.style.color="#D30000";
		nameerr.style.fontWeight="bold";
        isValid=false;
    }
    if (nameLength > 20 && name!== "") {
    	nameerr.innerHTML=" * predugo ime";
    	nameerr.style.color="#D30000";
		nameerr.style.fontWeight="bold";
        isValid=false;
    }
     if (lastnameLength < 3 && lastname!== "") {
    	lastnameerr.innerHTML=" * prekratko prezime";
    	lastnameerr.style.color="#D30000";
		lastnameerr.style.fontWeight="bold";
        isValid=false;
    }
    if (lastnameLength > 20 && lastname!== "") {
    	lastnameerr.innerHTML=" * predugo prezime";
    	lastnameerr.style.color="#D30000";
		lastnameerr.style.fontWeight="bold";
        isValid=false;
    }
    if (reg.test(mail)==false && mail !== "") {
        mailerr.innerHTML=" * pogresan mejl";
        mailerr.style.color="#D30000";
        mailerr.style.fontWeight="bold";
        isValid=false;
    }
    if (registerform.checkbox.checked=== false) {
                alert("Morate da prihvatite uslove koriscenja");
                isValid= false;
            }
    return isValid;
}