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
require_once("../bl/ProfilBL.class.php");
require_once("../bm/UserBM.class.php");

if(isset($_POST['izmeni'],$_POST['changename'],$_POST['changelastname'],$_POST['changeusername'],$_POST['changeemail'],$_POST['changepassword'])){
	$changeBL= new ProfilBL();
	$changeBL->UpdateProfile();
}

if (isset($_POST['deaktiviraj'])) {
	$deleteBL= new LoginBL();
	$deleteBL->DeleteProfile();
	$deleteBL->Logout();
}

$profilesBL=new ProfilBL();
$profili=$profilesBL->GetProfile();


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
		<script src="deactivation.js"></script>
	</head>
	<body>
		<!--  POCETAK HEADER -->
			<?php include "C:/xampp\htdocs\zavrsni\gui\header.php"; ?>
		<!-- KRAJ HEADER -->
		<div class="container">
			<div class="profil">
				<h2>Podesavanje profila</h2>
				<form action="" method="post">
					<p>Ime<input type="text" value="<?php		foreach ($profili as $profil) {
									printf("%s",$profil->Get_ime());
								}
					 ?>" name="changename"></p>
					<p>Prezime<input type="text"value="<?php		foreach ($profili as $profil) {
									printf("%s",$profil->Get_prezime());
								}
					 ?>" name="changelastname"></p>
					<p>Username<input type="text" value="<?php		foreach ($profili as $profil) {
									printf("%s",$profil->Get_username());
								}
					 ?>" name="changeusername"></p>
					<p>Email<input type="text" value="<?php		foreach ($profili as $profil) {
									printf("%s",$profil->Get_email());
								}
					 ?>" name="changeemail"></p>
					<p>Password<input type="password" name="changepassword"></p>
					<input type="submit" name="izmeni" value="IZMENI">
					<br><br>
					<input type="submit" onclick="return deactivation()" name="deaktiviraj" value="OBRISI PROFIL">
				</form>
			</div>
			<div class="problemi">
				<p>Ako imate problema sa podesavanjem profila, postavljanjem i izmenom oglasa, kontaktirajte me.</p>
				<p><i class="far fa-envelope"></i>&nbsp;&nbsp;kovrlijaivan@gmail.com</p>
				<article class="prijavanamejl">
					<p>Oglasi na email</p>
					<p><i class="fas fa-car-alt"></i></p>
					<p>Prijavi se na nasu mejling listu.Dobijaj obavestenja o najnovijim oglasima putem mejla.</p>
					<a href="prijavanamejl.php">PRIJAVI SE</a>
				</article>
			</div>
		</div>
		<!-- POCETAK FOOTER -->
			<?php include "C:/xampp\htdocs\zavrsni\gui/footer.php"; ?>
		<!-- KRAJ FOOTER -->
	</body>
</html>