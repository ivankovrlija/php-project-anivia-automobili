<?php 
if (session_id() === "") {
	session_start();
}
include_once("../QueryBuilder.php");
require_once("../bl/LoginBL.class.php");
require_once("../bl/MarkeBL.class.php");
require_once("../bl/GorivoBL.class.php");
require_once("../bl/StanjeBL.class.php");
require_once("../bl/OglasBL.class.php");
$loginBL=new LoginBL();
$loginBL->CheckUserSessionData();

$marksBL=new MarkeBL();
$marks=$marksBL->GetMarks();

$gasesBL= new GorivoBL();
$gases=$gasesBL->GetGas();

$statesBL= new StanjeBL();
$states=$statesBL->GetStanje();

$picturesBL=new OglasBL();
$pictures=$picturesBL->GetPictures();

$limitsBL=new OglasBL();
$limits=$limitsBL->GetLimits();


$results_per_page=6;
$number_of_pages= ceil(count($pictures)/$results_per_page) + 1;

 ?>
 <!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title>ZAVRSNI RAD</title>
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<script src="deactivation.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>
	<body onload="myfunction()" id="body">
		<!--  POCETAK HEADER -->
			<?php include "C:/xampp\htdocs\zavrsni\gui\header.php"; ?>
		<!-- KRAJ HEADER -->
		<!-- POCETAK CONTAINER -->
		<div class="container">
			<div class="pozadina">
				<img src="images/pozadina.jpg" alt="" class="mySlides" style="width:100%">
				<img src="images/pozadina1.jpg" alt="" class="mySlides" style="width:100%">
				<img src="images/pozadina2.jpg" alt="" class="mySlides" style="width:100%">
				<img src="images/pozadina3.jpg" alt="" class="mySlides" style="width:100%">
			</div>
			<script src="slider.js" type="text/javascript"></script>
			<h1>Automobili</h1>
			<div class="filteri">
			<br>
			<h2>Pretrazivac:</h2>
			<form action="" name="filtersform" method="post">
				<select id="marke" name="marke">
				 	<?php
						if (isset($marks) && $marks != null) {
							foreach ($marks as $mark) {
							printf("<option value='%s'> %s </option>",$mark->Get_id_marke(), $mark->Get_marke());
							}
						}
					 ?>
					 </select>
				<select name="vozilo">
					<option value="">Polovna i nova vozila</option>
					<?php
						if (isset($states) && $states != null) {
							foreach ($states as $state) {
							printf("<option value='%s'> %s </option>",$state->Get_id_stanje_vozila(), $state->Get_stanje_vozila());
							}
						}
					 ?>
				</select>
					<select name="gorivo">
					<?php
						if (isset($gases) && $gases != null) {
							foreach ($gases as $gas) {
							printf("<option value='%s'> %s </option>",$gas->Get_id_gorivo(), $gas->Get_gorivo());
							}
						}
					 ?>
				</select>
				<br>
				<br>
				<select>
					<option value="" disabled selected>Godiste od</option>
						<?php 
							if (file_exists("../xml/years.xml")) {
								$years= simplexml_load_file("../xml/years.xml");
								foreach ($years as $year) {
									printf("<option> %s </option>",$year);
								}
							}
						 ?>
				</select>
				<select name="" id="">
					<option value="" disabled selected>do</option>
					<?php 
							if (file_exists("../xml/years.xml")) {
								$years= simplexml_load_file("../xml/years.xml");
								foreach ($years as $year) {
									printf("<option> %s </option>",$year);
								}
							}
						 ?>
				</select>
				<input type="text" placeholder="Cena do &euro;">
				<br>
				<br>
				<input type="submit" name="search" value="PRETRAGA &#128270;">
				<br>
				<?php if (isset($_SESSION['user'])) { ?>
						<a href="oglas.php">POSTAVI OGLAS</a>
					<?php }else{?>
						<a href="login.php">POSTAVI OGLAS</a>
					<?php } ?>
			</form>
			</div>
			<div class="reklama">
				<br><br><br><br><br><br><br><br>
				<p>MESTO ZA VASU REKLAMU</p>
			</div>
			<section class="svi_oglasi" id="svi_oglasi">
				<?php
				foreach ($limits as $limit) {
						printf("<div><img src='slike_oglasa/%s' alt='slika_oglasa'><span>%d&euro;</span></div>",$limit->Get_slika_oglasa(),$limit->Get_cena());
				}
				 ?>
			</section>

			<article class="prijavanamejl">
				<p>Oglasi na email</p>
				<p><i class="fas fa-car-alt"></i></p>
				<p>Prijavi se na nasu mejling listu.Dobijaj obavestenja o najnovijim oglasima putem mejla.</p>
				<a href="prijavanamejl.php">PRIJAVI SE</a>
			</article>
			<div class="pagination">
			 	<?php 
				 	for ($page=1; $page < $number_of_pages; $page++) { 
						echo '<a id="pagination" href="index.php?page='. $page . '">' . $page . ' </a>';
					}	
				  ?>
			</div>
		</div>
		<!-- KRAJ CONTAINER -->
		<!-- POCETAK FOOTER -->
			<?php include "C:/xampp\htdocs\zavrsni\gui/footer.php"; ?>
		<!-- KRAJ FOOTER -->
	</body>
</html>