<?php 
if (session_id() === "") {
	session_start();
}
include_once("../bm/OglasBM.class.php");
include_once("../dm/OglasDM.class.php");
include_once("../dal/OglasDAL.class.php");
class OglasBL{

	public function InsertOglas(){
		$_id_marke=$this->test_input($_POST['marke']);
		$_id_stanje_vozila=$this->test_input($_POST['vozilo']);
		$_id_gorivo=$this->test_input($_POST['gorivo']);
		$_godiste=$this->test_input($_POST['godiste']);
		$_cena=$this->test_input($_POST['cena']);
		$_kontakt=$this->test_input($_POST['kontakt']);
		$_kilometraza=$this->test_input($_POST['kilometraza']);
		$_slika_oglasa=$_FILES['slika_oglasa'];
		$_opis_oglasa=$this->test_input($_POST['opis_oglasa']);
	
		if ($_id_marke != "" && $_id_stanje_vozila != "" && $_id_gorivo != "" && $_godiste != "" && $_cena != "" && $_kontakt != "" && $_kilometraza != "" && $_FILES['slika_oglasa']['error'] == 0 && $_opis_oglasa != "") {
			$oglas= new OglasBM();
			$oglas->SetNewOglas($_id_marke,$_id_stanje_vozila,$_id_gorivo,$_godiste,$_cena,$_kontakt,$_kilometraza,$_FILES['slika_oglasa']['name'],$_opis_oglasa);
			$oglasDM= $this->MapOglasBM2DM($oglas);

			$oglasDAL= new OglasDAL();
			$id = $oglasDAL->InsertOglas($oglasDM);

			if ($id == -1) {
				printf("doslo je do greske");
			}
			else{
				$name_file= $_FILES['slika_oglasa']['name'];
				$tmp_name= $_FILES['slika_oglasa']['tmp_name'];
				$local_image= "slike_oglasa/";
				chmod("../gui/slike_oglasa/", 0755);
				move_uploaded_file($tmp_name, $local_image . $name_file);
			}
		}
}
		private function MapOglasBM2DM($oglas){
				$oglasDM=new OglasDM();
				$oglasDM->LoadOglas(null,$oglas->Get_id_marke(), $oglas->Get_id_stanje_vozila(), $oglas->Get_id_gorivo(), $oglas->Get_godiste(), $oglas->Get_cena(), $oglas->Get_kontakt(), $oglas->Get_kilometraza(), $oglas->Get_slika_oglasa(), $oglas->Get_opis_oglasa(),$_SESSION['id']);

				return $oglasDM;
		}

// 			private function validateOglas i prosledimo oglasBm kao parametar
	private function test_input($data){
			$data = trim($data);
  			$data = stripslashes($data);
 			$data = htmlspecialchars($data);
  			return $data;
		}

	public function GetPictures(){
		$pictureDAL = new OglasDAL();
		$picturesDM = $pictureDAL->GetPictures();

		$pictures= $this->MapPicturesDM2BM($picturesDM);
		return $pictures;
	}
	public function GetLimits(){
		$limitDAL = new OglasDAL();
		$limitsDM = $limitDAL->GetLimited();

		$limits= $this->MapPicturesDM2BM($limitsDM);
		return $limits;
	}

		private function MapPicturesDM2BM($picturesDM){
		if ($picturesDM != null && is_array($picturesDM) && count($picturesDM) > 0) {
			foreach ($picturesDM as $pictureDM) {
				$pictureBM = new OglasBM();
				$pictureBM->SetPictures($pictureDM->Getcena(),$pictureDM->Getslika_oglasa());
				$pictures[] = $pictureBM;
			}
		}
		return isset($pictures) ? $pictures : null;
	}

	public function GetAllOglases(){
			$userID= $_SESSION['id'];
			$adDAL=new OglasDAL();
			$adsDM= $adDAL->GetAllOglases($userID);

			$ads= $this->MapAdsDM2BM($adsDM);
			return $ads;
	}

	private function MapAdsDM2BM($adsDM){
		if ($adsDM != null && is_array($adsDM) && count($adsDM) > 0) {
			foreach ($adsDM as $adDM) {
			$adBM = new OglasBM();
			$adBM->SetNewOglas($adDM->Getid_marke(), $adDM->Getid_stanje_vozila(), $adDM->Getid_gorivo(), $adDM->Getgodiste(),$adDM->Getcena(), $adDM->Getkontakt(),$adDM->Getkilometraza(),$adDM->Getslika_oglasa(),$adDM->Getopis(),null);
			$ads[] = $adBM;
			return isset($ads) ? $ads : null;
		}
		}
	}

	public function UpdateOglas(){
		$change_marka=$_POST['changemarka'];
		$change_stanje=$_POST['changestanje'];
		$change_gorivo=$_POST['changegorivo'];
		$change_godiste=$_POST['changegodiste'];
		$change_cena=$_POST['changecena'];
		$change_kontakt=$_POST['changekontakt'];
		$change_kilometraza=$_POST['changekilometraza'];
		$change_opis=$_POST['changeopis'];

		if ($change_marka != "" && $change_stanje != "" && $change_gorivo != "" && $change_godiste != "" && $change_cena != "" && $change_kontakt != "" && $change_kilometraza != "" && $change_opis != "") {
				$changeoglas= new OglasBM();
				$changeoglas->SetNewOglas($change_marka,$change_stanje,$change_gorivo,$change_godiste,$change_cena,$change_kontakt,$change_kilometraza,'',$change_opis);

				$changeoglasDM= $this->MapChangeOglasBM2DM($changeoglas);

				$changeoglasDAL=new OglasDAL();
				$changeoglasDAL->UpdateChangeOglas($changeoglasDM);
		}
	}

	private function MapChangeOglasBM2DM($changeoglas){
		$changeoglasDM=new OglasDM();
		$changeoglasDM->LoadOglas(null,$changeoglas->Get_id_marke(),$changeoglas->Get_id_stanje_vozila(),$changeoglas->Get_id_gorivo(),$changeoglas->Get_godiste(),$changeoglas->Get_cena(),$changeoglas->Get_kontakt(),$changeoglas->Get_kilometraza(),"",$changeoglas->Get_opis_oglasa(),$_SESSION['id']);
		
		return $changeoglasDM;
	}

	public function DeleteOglas(){
		$deleteoglasDAL=new OglasDAL();
		$deleteoglasDAL->DeleteOglas();
	}
}
 ?>