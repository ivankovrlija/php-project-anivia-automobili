<?php 
include_once("../dal/UserDAL.class.php");
include_once("../bm/UserBM.class.php");
include_once("../dm/UserDM.class.php");
include_once("../QueryBuilder.php");

class ProfilBL{
	public function GetProfile(){
			$userID=$_SESSION['id'];
			$profileDAL=new UserDAL();
			$profilesDM= $profileDAL->GetProfile($userID);
			
			$profiles= $this->MapProfilesDM2BM($profilesDM);
			return $profiles;
	} 
	private function MapProfilesDM2BM($profilesDM){
		if ($profilesDM != null && count($profilesDM) == 1) {
				$profileBM = new UserBM();
				$profileBM->SetNewUser($profilesDM->Getime(), $profilesDM->Getprezime(), $profilesDM->Getusername(), $profilesDM->Getemail(), $profilesDM->Getpassword());

				$profiles[] = $profileBM;
				return isset($profiles) ? $profiles : null;
			}
		}
		public function UpdateProfile(){
			$change_name=$this->test_input($_POST['changename']);
			$change_lastname=$this->test_input($_POST['changelastname']);
			$change_username=$this->test_input($_POST['changeusername']);
			$change_email=$this->test_input($_POST['changeemail']);
			$change_password=$this->test_input($_POST['changepassword']);
	
			if ($change_name != "" &&  $change_lastname != "" && $change_username != "" && $change_email != "" && $change_password != "") {
				$profile= new UserBM();
				$profile->SetNewUser($change_name,$change_lastname,$change_username,$change_email,$change_password);

				$profileDM= $this->MapProfileBM2DM($profile);

				$profileDAL=new UserDAL();
				$profileDAL->UpdateProfile($profileDM);
			}
		}
		private function MapProfileBM2DM($profile){
				$profileDM=new UserDM();
				$profileDM->SetUser(null,$profile->Get_ime(), $profile->Get_prezime(), $profile->Get_username(), $profile->Get_email(), $profile->Get_password(),null);

				return $profileDM;
		}

		private function test_input($data){
			$data = trim($data);
  			$data = stripslashes($data);
 			$data = htmlspecialchars($data);
  			return $data;
}
}
 ?>