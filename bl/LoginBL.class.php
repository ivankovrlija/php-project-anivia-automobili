<?php 
if (session_id() === "") {
	session_start();
}

include_once("../dal/UserDAL.class.php");
include_once("../bm/UserBM.class.php");

class LoginBL{
	public function LoginUser(){
			$username=isset($_POST['uname']) ? trim($_POST['uname']) : "";
			$password=isset($_POST['password']) ? trim($_POST['password']) : "";

			if ($username != ""  && $password != "") {
				$userDAL=new UserDAL();
				$user= $userDAL->GetUser($username, $password);
				if ($user != null) {
					$userDAL->UpdateLoginTime($user->Getid_korisnik());
					$this->SetUserObjectToSession($user);
					header("Location:index.php");
					exit;
				}
				return $user;
			}	
	}
		private function SetUserObjectToSession($user){
				$_SESSION["user"]= serialize($user);
				$_SESSION["timeout"]= time();
				$_SESSION['id']=$user->Getid_korisnik();
		}
		private function GetUserObjectToSession(){
			return unserialize($user);
		}
		public function CheckUserSessionData($this_page = ""){
			//$needToLogin= true;
			if (isset($_SESSION["user"],$_SESSION["timeout"])) {
				$inactive= 900;
				//$user->GetUserObjectFromSession();
					$sessionTTL= time() - $_SESSION['timeout'];
					if ($sessionTTL > $inactive) {
						$this->Logout();
					}
					$_SESSION["timeout"]= time();
					if ($this_page == "login" ) {
						header("Location:index.php");
						exit();
					}
					//$needToLogin= false;
			}
			}
		public function Logout(){
			$this->ClearSessions();
			$this->RedirectToHomePage();
		}
		private function RedirectToHomePage(){
			header("Location:index.php");
			exit();
		}
		private function ClearSessions(){
			unset($_SESSION["user"],$_SESSION["timeout"]);
		}
	
		public function InsertUser(){
			$_ime=$this->test_input($_POST['name']);
			$_prezime=$this->test_input($_POST['lastname']);
			$_username=$this->test_input($_POST['username']);
			$_email=$this->test_input($_POST['mail']);
			$_password=$this->test_input($_POST['pass']);
		
	if ($_ime!="" && $_prezime != "" && $_username !="" && $_email !="" && $_password !=""){
		$user=new UserBM();
		$user->SetNewUser($_ime,$_prezime,$_username,$_email,$_password);

		$userDM=$this->MapUserBM2DM($user);

		$userDAL=new UserDAL();
		$userDAL->InsertUser($userDM);
	}
		}
		private function test_input($data){
			$data = trim($data);
  			$data = stripslashes($data);
 			$data = htmlspecialchars($data);
  			return $data;
		}
		private function MapUserBM2DM($user){
			$userDM=new UserDM();
			$userDM->SetUser(null,$user->Get_ime(), $user->Get_prezime(), $user->Get_username(), $user->Get_email(), $user->Get_password(),null);

			return $userDM;
		}

		public function DeleteProfile(){
			$deleteDAL=new UserDAL();
			$deleteDAL->DeleteProfile();
		}
		}
 ?>