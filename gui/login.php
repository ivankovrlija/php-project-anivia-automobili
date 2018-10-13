<?php 
if (session_id() === "") {
	session_start();
}
require_once("../bl/LoginBL.class.php");
$loginBL=new LoginBL();
$loginBL->CheckUserSessionData("login");
if (isset($_POST['uname'],$_POST['password'])) {
	$test=$loginBL->LoginUser();
	if ($test==null) {
		echo "<div class='logingreska'>POGRESAN USERNAME ILI PASSWORD</div>";
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
	</head>
	<body>
		<div class="pozadina1"></div>
		<div class="login">
			<form action="login.php" name="loginform" method="POST">
				<p>Username</p>
				<input type="text" name="uname" placeholder="Username">
				<p>Password</p>
				<input type="password" name="password" placeholder="Password">
				<br>
				<br>
				<input type="submit" value="PRIJAVI SE" name="login">
				<br>
				<br>
				<a href="register.php"> Nemas nalog?</a>
			</form>
		</div>
	</body>
</html>