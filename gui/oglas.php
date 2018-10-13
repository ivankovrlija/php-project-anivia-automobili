<?php 
if (session_id() === "") {
	session_start();
}
if ($_SESSION['user'] == "") {
		header("Location:index.php");
		exit();
	}
include_once("../QueryBuilder.php");
require_once("../bl/LoginBL.class.php");
require_once("../bl/MarkeBL.class.php");
require_once("../bl/GorivoBL.class.php");
require_once("../bl/StanjeBL.class.php");
require_once("../bl/OglasBL.class.php");

$loginBL=new LoginBL();
$loginBL->CheckUserSessionData();
$marke_error=$vozilo_error=$gorivo_error=$godiste_error=$cena_error=$kontakt_error=$kilometraza_error=$slika_oglasa_error=$opis_oglasa_error="";
if(isset($_POST['postavioglas'],$_POST['marke'],$_POST['vozilo'],$_POST['gorivo'],$_POST['godiste'],$_POST['cena'],$_POST['kontakt'],$_POST['kilometraza'],$_FILES['slika_oglasa'],$_POST['opis_oglasa'])){
	$oglasBL= new OglasBL();
	$oglasBL->InsertOglas();
}

if(isset($_POST['postavioglas'])){
	if (empty($_godiste)) {
		$godiste_error= " *";
	}
	elseif (is_numeric($_godiste) == false) {
		$godiste_error= " * samo brojevi";
	}
	if (empty($_cena)) {
		$cena_error= " *";
	}
	elseif (is_numeric($_cena) == false) {
		$cena_error= " * samo brojevi";
	}
	if (empty($_kontakt)) {
		$kontakt_error= " *";
	}
	elseif (is_numeric($_kontakt) == false) {
		$kontakt_error= " * samo brojevi";
	}
	if (empty($_kilometraza)) {
		$kilometraza_error= " *";
	}
	elseif (is_numeric($_kilometraza) == false) {
		$kilometraza_error= " * samo brojevi";
	}
	if (empty($_opis_oglasa)) {
		$opis_oglasa_error= " *";
	}
	if ($_FILES['slika_oglasa']['tmp_name'] == "") {
		$slika_oglasa_error= " * izaberite sliku";
	}
	elseif($_FILES['slika_oglasa']['size'] > 2097152){
		$slika_oglasa_error= " * prevelika slika";
	}
	elseif ($_FILES['slika_oglasa']['type'] != "image/jpeg" && $_FILES['slika_oglasa']['type'] != "image/png") {
		$slika_oglasa_error= " * samo jpg/png";
	}
	}

$marksBL=new MarkeBL();
$marks=$marksBL->GetMarks();

$gasesBL= new GorivoBL();
$gases=$gasesBL->GetGas();

$statesBL= new StanjeBL();
$states=$statesBL->GetStanje();
 ?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title>ZAVRSNI RAD</title>
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<script src="validationoglas.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<script src="jquery-3.3.1.js"></script>
	</head>
	<body onload="myfunction()" id="body">
		<!--  POCETAK HEADER -->
			<?php include "C:/xampp\htdocs\zavrsni\gui\header.php"; ?>
		<!-- KRAJ HEADER -->
		<div class="container" ng-app="">
				<div class="pozadina">
				<img src="images/pozadina.jpg" alt="" class="mySlides" style="width:100%">
				<img src="images/pozadina1.jpg" alt="" class="mySlides" style="width:100%">
				<img src="images/pozadina2.jpg" alt="" class="mySlides" style="width:100%">
				<img src="images/pozadina3.jpg" alt="" class="mySlides" style="width:100%">
			</div>
			<script src="slider.js" type="text/javascript"></script>
			<h1>Postavljanje oglasa</h1>
			<div class="filteri" id="filteri">
			<br>
			<h2>Karakteristike:</h2>
			<form action="" name="oglasforma" method="post" enctype="multipart/form-data" onsubmit="return validateOglas()">
				<select id="marke" name="marke" onchange="return popunimarku()" onblur="check('marke')">
					<option value="-1">Marka</option>
				 	<?php
						if (isset($marks) && $marks != null) {
							foreach ($marks as $mark) {
							printf("<option value='%s'> %s </option>",$mark->Get_id_marke(), $mark->Get_marke());
							}
						}
					 ?>
					 </select>
					 <span class="error" id="markeerror"> <?php if(isset($_POST['postavioglas'])){ echo $marke_error; }?></span>
				<select onchange="return popunivozilo()" id="vozilo" name="vozilo" onblur="check('vozilo')">
					<option value="-1">Stanje</option>
					<?php
						if (isset($states) && $states != null) {
							foreach ($states as $state) {
							printf("<option value='%s'> %s </option>",$state->Get_id_stanje_vozila(), $state->Get_stanje_vozila());
							}
						}
					 ?>
				</select>
				<span class="error" id="voziloerror"> <?php if(isset($_POST['postavioglas'])){ echo $vozilo_error; }?></span>
				<br><br>
				<select onchange="return popunigorivo()" name="gorivo" id="gorivo" onblur="check('gorivo')">
					<option value="-1">Gorivo</option>
					<?php
						if (isset($gases) && $gases != null) {
							foreach ($gases as $gas) {
							printf("<option value='%s'> %s </option>",$gas->Get_id_gorivo(), $gas->Get_gorivo());
							}
						}
					 ?>
				</select>
				<span class="error" id="gorivoerror"> <?php if(isset($_POST['postavioglas'])){ echo $gorivo_error; }?></span>
				<input type="text" id="godiste" placeholder="Godiste" name="godiste" ng-model="godiste" onblur="check('godiste')">
				<span class="error" id="godisteerror"> <?php if(isset($_POST['postavioglas'])){ echo $godiste_error;} ?></span>
				<br><br>
				<input type="text" id="cena" placeholder="Cena &euro;" name="cena" ng-model="cena" onblur="check('cena')">
				<span class="error" id="cenaerror"> <?php if(isset($_POST['postavioglas'])){ echo $cena_error; }?></span>
				<input type="text" id="kontakt" placeholder="Kontakt telefon" name="kontakt" ng-model="kontakt" onblur="check('kontakt')">
				<span class="error" id="kontakterror"> <?php if(isset($_POST['postavioglas'])){ echo $kontakt_error;} ?></span>
				<br><br>
				<input type="text" id="kilometraza" placeholder="Kilometraza" name="kilometraza" ng-model="kilometraza" onblur="check('kilometraza')">
				<span class="error" id="kilometrazaerror"> <?php if(isset($_POST['postavioglas'])){ echo $kilometraza_error; }?></span>
				<input type="file" id="slika_oglasa" name="slika_oglasa" onchange="showImage.call(this)">
				<span class="error" id="slika_oglasaerror"> <?php if(isset($_POST['postavioglas'])){ echo $slika_oglasa_error;} ?></span>
				<script>
					function showImage(){
						if (this.files && this.files[0]) {
							obj = new FileReader();
							obj.onload = function(data){
								image = document.getElementById("image");
								image.src = data.target.result;
								image.style.display = "block";
							}
							obj.readAsDataURL(this.files[0]);
						}
					}
				</script>
				<br><br>
				<input type="textarea" placeholder="Napisite nesto o automobilu" name="opis_oglasa" ng-model="textarea">
				<br><br>
				<input type="submit" name="postavioglas" value="POSTAVI OGLAS">
			</form>
			</div>
			<div class="reklama">
				<p id="pcenter">MESTO ZA VASU REKLAMU</p>
			</div>
			<div class="livepreview">
				<h3>Ovako izgleda Vas oglas</h3>
				<div class="slikaoglasa">
					<img src="" style="display: none; height: 300px; border-radius: 50%;" id="image">
				</div>
				<div class="angularmagija">
					<p>Opis:&nbsp;&nbsp;<span ng-bind="textarea"></span></p>
					<br>
					<p>Marka vozila:&nbsp;&nbsp;<span id="ispismarke"></span></p>
					<p>Stanje vozila:&nbsp;&nbsp;<span id="ispisvozila"></span></p>
					<p>Vrsta goriva:&nbsp;&nbsp;<span id="ispisgoriva"></span></p>
					<p>Godiste:&nbsp;&nbsp;<span ng-bind="godiste"></span></p>
					<p>Cena:&nbsp;&nbsp;<span ng-bind="cena"></span></p>
					<p>Kontakt:&nbsp;&nbsp;<span ng-bind="kontakt"></span></p>
					<p>Kilometraza:&nbsp;&nbsp;<span ng-bind="kilometraza"></span></p>
				</div>
			</div>
			<article class="prijavanamejl">
				<p>Oglasi na email</p>
				<p><i class="fas fa-car-alt"></i></p>
				<p>Prijavi se na nasu mejling listu.Dobijaj obavestenja o najnovijim oglasima putem mejla.</p>
				<a href="https://www.google.com">PRIJAVI SE</a>
			</article>
		</div>
		<!-- POCETAK FOOTER -->
			<?php include "C:/xampp\htdocs\zavrsni\gui/footer.php"; ?>
		<!-- KRAJ FOOTER -->
	</body>
</html>