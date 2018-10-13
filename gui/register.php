<?php 
if (session_id() === "") {
	session_start();
}

include_once("../QueryBuilder.php");
include_once("../dm/UserDM.class.php");
require_once("../bl/LoginBL.class.php");
$loginBL=new LoginBL();
$loginBL->CheckUserSessionData();
$name_error=$lastname_error=$email_error=$username_error=$pass_error=$checkbox_error="";

if (isset($_POST['register'],$_POST['name'],$_POST['lastname'],$_POST['username'],$_POST['mail'],$_POST['pass'],$_POST['checkbox'])) { 
	$loginBL= new loginBL();
	$loginBL->InsertUser();
	$loginBL->LoginUser();
	}
	else{
			if (empty($_ime)) {
		$name_error=" * unesite ime";
	}
	elseif(strlen($_ime) > 20){
		$name_error= " * predugo ime";
	}
	elseif(strlen($_ime) < 2){
		$name_error= " * prekratko ime";
	}
	if (empty($_prezime)) {
		$lastname_error= " * unesite prezime";
	}
	elseif(strlen($_prezime) > 20){
		$lastname_error= " * predugo prezime";
	}
	elseif(strlen($_prezime) < 2){
		$lastname_error= " * prekratko prezime";
	}
	if (empty($_email)) {
		$email_error=" * unesite email";
	}
	elseif (!filter_var(($_email), FILTER_VALIDATE_EMAIL)) {
		$email_error=" * pogresan email";
	}
		if (empty($_username)) {
		$username_error=" * unesite username";
	}
		if (empty($_password)) {
		$pass_error=" * unesite password";
	}
	if (empty($_POST["checkbox"])) {
		$checkbox_error = " * morate da prihvatite uslove koriscenja";
	}
	}
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
		<script src="validation.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="pozadina1"></div>
		<div class="login">
			<form action="register.php" method="post" name="registerform" onsubmit="return validateForm()">
				<p>Ime<span class="error" id="nameerror"><?php if (isset($_POST['register'])) {
					echo $name_error; 
				}?></span></p>
				<input id="name" type="text" name="name" placeholder="Ime" onblur="check('name')">
				<p>Prezime<span class="error" id="lastnameerror"><?php if (isset($_POST['register'])) { echo $lastname_error;} ?></span></p>
				<input type="text" name="lastname" id="lastname" placeholder="Prezime" onblur="check('lastname')">
				<p>Username<span class="error" id="usernameerror"><?php if (isset($_POST['register'])) { echo $username_error;} ?></span></p>
				<input type="text" name="username" id="username" placeholder="Username" onblur="check('username')">
				<p>Email<span class="error" id="mailerror"><?php if (isset($_POST['register'])) { echo $email_error;} ?></span></p>
				<input type="text" name="mail" id="mail" placeholder="Email" onblur="check('mail')">
				<p>Lozinka<span class="error" id="passerror"><?php if (isset($_POST['register'])) { echo $pass_error;} ?></span></p>
				<input type="password" name="pass" id="pass" placeholder="Password" onblur="check('pass')">
				<p><input type="checkbox" name="checkbox">Prihvatam uslove koriscenja</p>
				 <span class="error"><?php if (isset($_POST['register'])) {echo $checkbox_error;} ?></span>
				<br><br>
				<input type="submit" value="REGISTRUJ SE" name="register">
			</form>
		</div>
	</body>
</html>