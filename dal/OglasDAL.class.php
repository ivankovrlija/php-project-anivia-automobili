<?php 
if (session_id() === "") {
	session_start();
}
include_once("../QueryBuilder.php");
include_once("../dm/MarkeDM.class.php");
include_once("../dm/GorivoDM.class.php");
include_once("../dm/StanjeDM.class.php");
/* Klasa koja ima metode za komunikaciju sa bazom podataka,klasa koja ce da uzme select oglasa i da napuni objekat. */
class OglasDAL{
	public function GetOglas($userID){
		$query= sprintf("select o.id_oglas,o.id_marke,o.id_stanje_vozila,o.id_gorivo,o.godiste,o.cena,o.kontakt,o.kilometraza,o.slika_oglasa,o.opis,o.id_korisnik
			from oglas as o
			where o.id_korisnik= '%s'",$userID);

		$oglasResult=QueryBuilder::Select($query);
		if ($oglasResult!= null && is_array($oglasResult) && count($oglasResult)==1) {
			$oglas=new OglasDM();
			$oglasArray=$oglasResult[0];
			$oglas->SetOglas($oglasArray["id_oglas"],$oglasArray["id_marke"],$oglasArray["id_stanje_vozila"],$oglasArray["id_gorivo"],$oglasArray["godiste"],$oglasArray["cena"],$oglasArray["kontakt"],$oglasArray["kilometraza"],$oglasArray["slika_oglasa"],$oglasArray["opis"],$oglasArray["id_korisnik"]);
		}
		return isset($oglas) ? $oglas : null;
	}

	public function InsertOglas($oglas){
		$params=[
					'id_marke' => $oglas->Getid_marke(),
					'id_stanje_vozila' => $oglas->Getid_stanje_vozila(),
					'id_gorivo' => $oglas->Getid_gorivo(),
					'godiste' => $oglas->Getgodiste(),
					'cena' => $oglas->Getcena(),
					'kontakt' => $oglas->Getkontakt(),
					'kilometraza' => $oglas->Getkilometraza(),
					'slika_oglasa' => $oglas->Getslika_oglasa(),
					'opis' => $oglas->Getopis(),
					'id_korisnik' => $oglas->Getid_korisnik()
					];
					// die(var_dump($params));
					$resultArray= QueryBuilder::Insert("oglas",$params);

					$id= -1;
					if (isset($resultArray) && $resultArray != null) {
						if (count($resultArray) == 1) {
							$id = $resultArray["insert_id"];
							$_SESSION['oglas_id']=$id;
							header("Location:index.php");
						}
						else if(count($resultArray) == 2){
							// izbrisi ovo posle metnolko 
							echo "Doslo je do greske";
							exit();
						}
					}
					return $id;
	}
	
	/* funkcija uzme marke i da napuni objekat. */
	public function GetMarks(){
		$query="select id_marke,marke from marke";

		$marksResult=QueryBuilder::Select($query);
		if ($marksResult != null && is_array($marksResult) && count($marksResult) > 0){
			foreach ($marksResult as $markResult) {
				$mark=new MarkeDM();
				$mark->SetMarks($markResult['id_marke'],$markResult['marke']);
				$marks[]=$mark;
			}
		}
		return isset($marks) ? $marks : null;
	}
/* funkcija uzme gorivo i napuni objekat. */
		public function GetGas(){
		$query="select id_gorivo,gorivo from gorivo";

		$gasesResult=QueryBuilder::Select($query);
		if ($gasesResult != null && is_array($gasesResult) && count($gasesResult) > 0){
			foreach ($gasesResult as $gasResult) {
				$gas=new GorivoDM();
				$gas->SetGas($gasResult['id_gorivo'],$gasResult['gorivo']);
				$gases[]=$gas;
			}
		}
		return isset($gases) ? $gases : null;
	}
/* funkcija koja ce da uzme stanje vozila i da napuni objekat. */
public function GetStanje(){
		$query="select id_stanje_vozila,stanje_vozila from stanje_vozila";

		$statesResult=QueryBuilder::Select($query);
		if ($statesResult != null && is_array($statesResult) && count($statesResult) > 0){
			foreach ($statesResult as $stateResult) {
				$state=new StanjeDM();
				$state->SetStanje($stateResult['id_stanje_vozila'],$stateResult['stanje_vozila']);
				$states[]=$state;
			}
		}
		return isset($states) ? $states : null;
	}
	/* funkcija uzme slike i da napuni objekat. */
	public function GetPictures(){
		$query=sprintf("select cena,slika_oglasa from oglas");

		$picturesResult=QueryBuilder::Select($query);
		if ($picturesResult != null && is_array($picturesResult) && count($picturesResult) > 0){
			foreach ($picturesResult as $pictureResult) {
				$picture=new OglasDM();
				$picture->SetPictures($pictureResult['cena'],$pictureResult['slika_oglasa']);
				$pictures[]=$picture;
			}
		}
		
		return isset($pictures) ? $pictures : null;
	}
	public function GetAllOglases($userID){
		$query=sprintf("select oglas.id_oglas,marke.marke,stanje_vozila.stanje_vozila,gorivo.gorivo,oglas.godiste,oglas.cena,oglas.kontakt,oglas.kilometraza,oglas.slika_oglasa,oglas.opis
					from oglas
					inner join marke on oglas.id_marke=marke.id_marke
					inner join stanje_vozila on oglas.id_stanje_vozila=stanje_vozila.id_stanje_vozila
					inner join gorivo on oglas.id_gorivo=gorivo.id_gorivo
					where id_korisnik=%s",$userID);

		$adResult=QueryBuilder::Select($query);

		if ($adResult != null && is_array($adResult) && count($adResult) > 0) {
			foreach ($adResult as $adsResult) {
			$ad=new OglasDM();
			
			$ad->LoadOglas(null,$adsResult["marke"],$adsResult["stanje_vozila"],$adsResult["gorivo"],$adsResult["godiste"],$adsResult["cena"],$adsResult["kontakt"],$adsResult["kilometraza"],$adsResult["slika_oglasa"],$adsResult["opis"],$_SESSION['id']);
			$ads[]=$ad;
		}
	}
	return isset($ads) ? $ads : null;
}

	public function UpdateChangeOglas($changeoglasDM){
		$params=[
					'id_marke' => $changeoglasDM->Getid_marke(),
					'id_stanje_vozila' => $changeoglasDM->Getid_stanje_vozila(),
					'id_gorivo' => $changeoglasDM->Getid_gorivo(),
					'godiste' => $changeoglasDM->Getgodiste(),
					'cena' => $changeoglasDM->Getcena(),
					'kontakt' => $changeoglasDM->Getkontakt(),
					'kilometraza' => $changeoglasDM->Getkilometraza(),
					'opis' => $changeoglasDM->Getopis()
				];
			QueryBuilder::Update("oglas", $_SESSION['oglas_id'] ,$params);
			header("location:index.php");
			exit();
	}

		public function GetLimited(){
		$results_per_page = 6;
		if (!isset($_GET['page'])) {
			$page = 1;
		}
		else{
			$page = $_GET['page'];
		}
		$this_page_first_result = ($page - 1) * $results_per_page;
		$query=sprintf("select cena,slika_oglasa from oglas limit " . $this_page_first_result . "," . $results_per_page);

		$limitsResult=QueryBuilder::Select($query);
		if ($limitsResult != null && is_array($limitsResult) && count($limitsResult) > 0){
			foreach ($limitsResult as $limitResult) {
				$limit=new OglasDM();
				$limit->SetPictures($limitResult['cena'],$limitResult['slika_oglasa']);
				$limits[]=$limit;
			}
		}
		
		return isset($limits) ? $limits : null;
	}
	public function DeleteOglas(){
		QueryBuilder::Delete("oglas",$_SESSION['oglas_id']);
	}

	public function selectOglasiAdmin(){
		$query="select 		oglas.id_oglas,marke.id_marke,marke.marke,stanje_vozila.id_stanje_vozila,stanje_vozila.stanje_vozila,gorivo.id_gorivo,gorivo.gorivo,oglas.godiste,oglas.kontakt,oglas.kilometraza,oglas.slika_oglasa,oglas.opis
	from oglas
	inner join marke on oglas.id_marke=marke.id_marke
	inner join stanje_vozila on oglas.id_stanje_vozila=stanje_vozila.id_stanje_vozila
	inner join gorivo on oglas.id_gorivo=gorivo.id_gorivo";
	$rezultat=QueryBuilder::Select($query);
	}
}
 ?>