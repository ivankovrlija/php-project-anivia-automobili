<?php 
$name_error=$lastname_error=$mail_error=$username_error=$pass_error=$checkbox_error="";
function test_input($data){
	$data = trim($data);
  	$data = stripslashes($data);
 	$data = htmlspecialchars($data);
  	return $data;
}
if (isset($_POST['register'])) { 
	$name=test_input($_POST["name"]);
	$lastname=test_input($_POST["lastname"]);
	$username=test_input($_POST["username"]);
	$mail=test_input($_POST["mail"]);
	$password=test_input($_POST["pass"]);

		if (empty($name)) {
		$name_error=" * unesite ime";
	}
	elseif(strlen($name) > 20){
		$name_error= " * predugo ime";
	}
	elseif(strlen($name) < 2){
		$name_error= " * prekratko ime";
	}
	if (empty($lastname)) {
		$lastname_error= " * unesite prezime";
	}
	elseif(strlen($lastname) > 20){
		$lastname_error= " * predugo prezime";
	}
	elseif(strlen($lastname) < 2){
		$lastname_error= " * prekratko prezime";
	}
	if (empty($mail)) {
		$mail_error=" * unesite email";
	}
	elseif (!filter_var(($mail), FILTER_VALIDATE_EMAIL)) {
		$mail_error=" * pogresan email";
	}
		if (empty($username)) {
		$username_error=" * unesite username";
	}
		if (empty($password)) {
		$pass_error=" * unesite password";
	}
	if (empty($_POST["checkbox"])) {
		$checkbox_error = " * morate da prihvatite uslove koriscenja";
	}
	if ($name_error=="" && $lastname_error == "" && $username_error=="" && $mail_error=="" && $pass_error=="" && $checkbox_error=="") {
		$params= [
				'ime' => $name,
				'prezime' => $lastname,
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'poslednje_logovanje' => date('Y-m-d H:i:s'),
				'id_status' => 1
			];
			QueryBuilder::Insert("korisnik", $params);
			header("location:login.php");
			exit();
	}

	}

 ?>