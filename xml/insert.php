<?php 
include_once("../QueryBuilder.php");
// PROVERIS DA LI POSTOJI FAJL I AKO POSTOJI UCITAS GA
if (file_exists("cars.xml")) {
	$cars= simplexml_load_file("cars.xml");
		foreach($cars->children() as $car){
			$param=[
					'marke' => $car['name']
			];
			QueryBuilder::Insert("marke",$param);
		}
	}



 ?>