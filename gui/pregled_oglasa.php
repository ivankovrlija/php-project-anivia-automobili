<?php 
if (session_id() === "") {
	session_start();
}
if ($_SESSION['user'] == "") {
		header("Location:index.php");
		exit();
	}
require_once("../bl/LoginBL.class.php");
require_once("../bl/OglasBL.class.php");
$loginBL=new LoginBL();
$loginBL->CheckUserSessionData();

if(isset($_POST['changeoglas'],$_POST['changemarka'],$_POST['changestanje'],$_POST['changegorivo'],$_POST['changegodiste'],$_POST['changecena'],$_POST['changekontakt'],$_POST['changekilometraza'],$_POST['changeopis'])){

	$changeoglasBL= new OglasBL();
	$changeoglasBL->UpdateOglas();
}
if (isset($_POST['delete'])) {
	$deleteoglasBL=new OglasBL;
	$deleteoglasBL->DeleteOglas();
}
$adsBL=new OglasBL();
$adovi=$adsBL->GetAllOglases();

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
	</head>
	<body onload="scroll()" id="body">
		<?php include_once("header.php"); ?>
		<div class="container">
			<div class="pozadina">
				<img src="images/pozadina.jpg" alt="" class="mySlides" style="width:100%">
				<img src="images/pozadina1.jpg" alt="" class="mySlides" style="width:100%">
				<img src="images/pozadina2.jpg" alt="" class="mySlides" style="width:100%">
				<img src="images/pozadina3.jpg" alt="" class="mySlides" style="width:100%">
			</div>
			<script src="slider.js" type="text/javascript"></script>
			<h1>Pregled oglasa</h1>
			<div class="pregled_oglasa" id="pregled_oglasa">
				<?php if ($adovi != null) {?>
				<div>
					<form action="pregled_oglasa.php" method="post">
					<p>Slika oglasa: &nbsp;<img src="<?php		foreach ($adovi as $ad) {
									printf("slike_oglasa/%s",$ad->Get_slika_oglasa());
								}?>" alt=""></p>
							<p>Marka: &nbsp;<input type="text" value="<?php		foreach ($adovi as $ad) {
									printf("%s",$ad->Get_id_marke());
								}
					 ?>" name="changemarka"></p>
					 	<p>Stanje vozila: &nbsp;<input type="text" value="<?php		foreach ($adovi as $ad) {
									printf("%s",$ad->Get_id_stanje_vozila());
								}
					 ?>" name="changestanje"></p>
					 	<p>Vrsta goriva: &nbsp;<input type="text" value="<?php		foreach ($adovi as $ad) {
									printf("%s",$ad->Get_id_gorivo());
								}
					 ?>" name="changegorivo"></p>
					 	<p>Godiste: &nbsp;<input type="text" value="<?php		foreach ($adovi as $ad) {
									printf("%s",$ad->Get_godiste());
								}
					 ?>" name="changegodiste"></p>
					 	<p>Cena: &nbsp;<input type="text" value="<?php		foreach ($adovi as $ad) {
									printf("%s",$ad->Get_cena());
								}
					 ?>" name="changecena"></p>
					 	<p>Kontakt: &nbsp;<input type="text" value="<?php		foreach ($adovi as $ad) {
									printf("%s",$ad->Get_kontakt());
								}
					 ?>" name="changekontakt"></p>
					 	<p>Kilometraza: &nbsp;<input type="text" value="<?php		foreach ($adovi as $ad) {
									printf("%s",$ad->Get_kilometraza());
								}
					 ?>" name="changekilometraza"></p>
					 	<p>Opis oglasa: &nbsp;<input type="text" value="<?php		foreach ($adovi as $ad) {
									printf("%s",$ad->Get_opis_oglasa());
								}
					 ?>" name="changeopis"></p>
					 <input type="submit" name="delete" value="OBRISI OGLAS">
					 <input type="submit" name="changeoglas" value="IZMENI">
					 </form>
				</div>
			<?php }
			else{
				echo "<div>Nemate aktivnih oglasa</div>";
			}
			 ?>
			</div>
			<div class="reklama">
				<p>MESTO ZA VASU REKLAMU</p>
			</div>
			<div>
				
			</div>
			<article class="prijavanamejl">
				<p>Oglasi na email</p>
				<p><i class="fas fa-car-alt"></i></p>
				<p>Prijavi se na nasu mejling listu.Dobijaj obavestenja o najnovijim oglasima putem mejla.</p>
				<a href="https://www.google.com">PRIJAVI SE</a>
			</article>
		</div>
		<?php include_once("footer.php"); ?>
	</body>
</html>