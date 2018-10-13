<?php 
if (file_exists("cars.xml")) {
	$cars= simplexml_load_file("cars.xml");

	$queryValues="";
	$separator= " ";
	foreach($cars->children() as $car){
		$queryValues= sprintf("%s %s ('%s')",$queryValues,$separator,$car["name"]);
		$separator=", ";
	}
	$query=sprintf("insert into marke(marke) values %s;", $queryValues);
	$connection=new mysqli("localhost","root","","zavrsni");
	$connection->query($query);
	if ($connection->errno) {
		echo "greska" . $connection->errno . $connection->error;
	}
	else{
		echo "sjajno";
	}
	$connection->close();

}

 ?>