<?php 
include("db.class.php");
include_once("QueryBuilder.php");

/*$params = [
	'ime' => 'Aca',
	'prezime' => 'Testic',
	'username' => 'testerko',
	'email' => 'test@test.com',
	'password' => 'testiram',
	'id_status' => 1
];
/*$result=QueryBuilder::Insert("korisnik", $params);
$id=$result['insert_id'];
if ($result) {
	echo 'The ID is: ' . $id;
}*/

/*$query="select oglas.id_oglas,marke.marke,stanje_vozila.stanje_vozila,gorivo.gorivo,oglas.godiste,oglas.kontakt,oglas.kilometraza,oglas.slika_oglasa,oglas.opis
from oglas
inner join marke on oglas.id_marke=marke.id_marke
inner join stanje_vozila on oglas.id_stanje_vozila=stanje_vozila.id_stanje_vozila
inner join gorivo on oglas.id_gorivo=gorivo.id_gorivo
where id_korisnik=1";

$result=QueryBuilder::Select($query);
foreach ($result as $key => $results) {
	foreach ($results as $key => $value) {
		echo $value;
	}
}

/*

 QueryBuilder::Update("korisnik", 21, $params);


$query="select * from korisnik";
$rezultat=QueryBuilder::Select($query);
var_dump($rezultat);*/
 //QueryBuilder::Delete("korisnik", 94);

$query="select oglas.id_oglas,marke.id_marke,marke.marke,stanje_vozila.id_stanje_vozila,stanje_vozila.stanje_vozila,gorivo.id_gorivo,gorivo.gorivo,oglas.godiste,oglas.kontakt,oglas.kilometraza,oglas.slika_oglasa,oglas.opis
	from oglas
	inner join marke on oglas.id_marke=marke.id_marke
	inner join stanje_vozila on oglas.id_stanje_vozila=stanje_vozila.id_stanje_vozila
	inner join gorivo on oglas.id_gorivo=gorivo.id_gorivo";
	$rezultat=QueryBuilder::Select($query);
	foreach ($rezultat as $value) {
		print_r($value["id_marke"]);
	}
 ?>