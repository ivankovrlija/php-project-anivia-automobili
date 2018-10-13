<?php 
if (session_id() === "") {
	session_start();
}
require_once("../bl/LoginBL.class.php");
$loginBL=new LoginBL();
$loginBL->Logout();
 ?>