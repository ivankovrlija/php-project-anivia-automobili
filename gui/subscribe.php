<?php 
if (isset($_POST['subscribe'])) {
	$maillist= $_POST['maillist'];
	$namelist= $_POST['namelist'];
	$lastnamelist= $_POST['lastnamelist'];


	if (!empty($maillist) && !filter_var($maillist, FILTER_VALIDATE_EMAIL) === false && !empty($namelist) && !empty($lastnamelist)) {
		$apikey="a79cc88ff31452ccc8709dd20dbb6981-us19";
		$listid="77d1be2f4b";
	}
}



 ?>