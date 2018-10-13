function validateOglas(){
	isValid=true;
	 var godiste = document.getElementById("godiste").value;
	var godisteerror = document.getElementById("godisteerror");
	var cena = document.getElementById("cena").value;
	var cenaerror = document.getElementById("cenaerror");
	var kontakt = document.getElementById("kontakt").value;
	var kontakterror = document.getElementById("kontakterror");
	var kilometraza = document.getElementById("kilometraza").value;
	var kilometrazaerror = document.getElementById("kilometrazaerror");
	var slika_oglasa= document.getElementById("slika_oglasa");
	var slika_oglasa_error = document.getElementById("slika_oglasaerror");
	var slika_oglasa_path = slika_oglasa.value;
    var markevalue= document.getElementById('marke');
    var marke= markevalue.options[markevalue.selectedIndex].value;
    var markeerror= document.getElementById('markeerror');
    var vozilovalue= document.getElementById('vozilo');
    var vozilo= vozilovalue.options[vozilovalue.selectedIndex].value;
    var voziloerror= document.getElementById('voziloerror');
    var gorivovalue= document.getElementById('gorivo');
    var gorivo= gorivovalue.options[gorivovalue.selectedIndex].value;
    var gorivoerror= document.getElementById('gorivoerror');
	var allowedEx = /(\.jpg|\.jpeg|\.png)$/i;
	var date = new Date();
	
        if (marke == -1) {
            markeerror.innerHTML=" * obavezno";
            markeerror.style.color="#D30000";
            isValid=false;
        }
         if (gorivo == -1) {
            gorivoerror.innerHTML=" * obavezno";
            gorivoerror.style.color="#D30000";
            isValid=false;
        }
         if (vozilo == -1) {
            voziloerror.innerHTML=" * obavezno";
            voziloerror.style.color="#D30000";
            isValid=false;
        }
	  if (godiste == "") {
        godisteerror.innerHTML=" * obavezno";
		godisteerror.style.color="#D30000";
        isValid=false;
    }
     if (cena == "") {
        cenaerror.innerHTML=" * obavezno";
		cenaerror.style.color="#D30000";
        isValid=false;
    }
     if (kontakt == "") {
        kontakterror.innerHTML=" * obavezno";
		kontakterror.style.color="#D30000";
        isValid=false;
    }
    if (kilometraza == "") {
        kilometrazaerror.innerHTML=" * obavezno";
		kilometrazaerror.style.color="#D30000";
        isValid=false;
    }
    if (isNaN(godiste)) {
    	godisteerror.innerHTML=" * samo brojevi";
		godisteerror.style.color="#D30000";
        isValid=false;
    }
     if (godiste < 1990 && godiste != "") {
    	godisteerror.innerHTML=" * godista pocinju od 1990";
		godisteerror.style.color="#D30000";
        isValid=false;
    }
    if (godiste > date.getFullYear()) {
    	godisteerror.innerHTML=" * trenutna godina je " + date.getFullYear();
		godisteerror.style.color="#D30000";
        isValid=false;
    }
    if (isNaN(cena)) {
    	cenaerror.innerHTML=" * samo brojevi";
		cenaerror.style.color="#D30000";
        isValid=false;
    }
    if (isNaN(kontakt)) {
    	kontakterror.innerHTML=" * samo brojevi";
		kontakterror.style.color="#D30000";
        isValid=false;
    }
    if (isNaN(kilometraza)) {
    	kilometrazaerror.innerHTML=" * samo brojevi";
		kilometrazaerror.style.color="#D30000";
        isValid=false;
    }
    if (!allowedEx.exec(slika_oglasa_path)) {
    	slika_oglasaerror.innerHTML=" * samo jpg/png";
		slika_oglasaerror.style.color="#D30000";
    	isValid=false;
    }
    return isValid;
}

function popunimarku(){
    var selectbox= document.getElementById('marke');
    var userinput= selectbox.options[selectbox.selectedIndex].value;
    var output= document.getElementById('ispismarke');
   
     if (userinput == 1) {
        output.innerHTML="Audi";
    }
      if (userinput == 2) {
        output.innerHTML="Alfa romeo";
    }
    if (userinput == 3) {
        output.innerHTML="BMW";
    }
      if (userinput == 4) {
        output.innerHTML="Citroen";
    }
      if (userinput == 5) {
        output.innerHTML="Chevrolet";
    }
      if (userinput == 6) {
        output.innerHTML="Ford";
    }
      if (userinput == 7) {
        output.innerHTML="Fiat";
    }
      if (userinput == 8) {
        output.innerHTML="Dacia";
    }
      if (userinput == 9) {
        output.innerHTML="Kia";
    }
      if (userinput == 10) {
        output.innerHTML="Mitsubishi";
    }
      if (userinput == 11) {
        output.innerHTML="Mazda";
    }
      if (userinput == 12) {
        output.innerHTML="Mercedes";
    }
      if (userinput == 13) {
        output.innerHTML="Opel";
    }
      if (userinput == 14) {
        output.innerHTML="Peugeot";
    }
      if (userinput == 15) {
        output.innerHTML="Renault";
    }
      if (userinput == 16) {
        output.innerHTML="Suzuki";
    }
      if (userinput == 17) {
        output.innerHTML="Volkswagen";
    }
      if (userinput == 18) {
        output.innerHTML="Volvo";
    }
}
function popunivozilo(){
    var selectbox= document.getElementById('vozilo');
    var userinput= selectbox.options[selectbox.selectedIndex].value;
    var output= document.getElementById('ispisvozila');

    if (userinput == 1) {
        output.innerHTML= "Novo vozilo";
    }
      if (userinput == 2) {
        output.innerHTML= "Polovno vozilo";
    }
}

function popunigorivo(){
    var selectbox= document.getElementById('gorivo');
    var userinput= selectbox.options[selectbox.selectedIndex].value;
    var output= document.getElementById('ispisgoriva');

    if (userinput == 1) {
        output.innerHTML="Benzin";
    }
    if (userinput == 2) {
        output.innerHTML="Dizel";
    }
    if (userinput == 3) {
        output.innerHTML="Benzin i gas";
    }
}
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
        function myfunction(){
            setTimeout(function(){
                    var elmnt = document.getElementById("filteri");
                    elmnt.scrollIntoView();
                    document.getElementById("body").style.transitionDuration = "10s";},1000);
        }
          function scroll(){
            setTimeout(function(){
                    var elmnt = document.getElementById("pregled_oglasa");
                    elmnt.scrollIntoView();
                    document.getElementById("body").style.transitionDuration = "10s";},1000);
        }