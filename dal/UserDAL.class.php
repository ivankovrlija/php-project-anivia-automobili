<?php 
include_once("../QueryBuilder.php");
include_once("../dm/UserDM.class.php");
/* Klasa koja ima metode za komunikaciju sa bazom podataka,klasa koja ce da uzme select korisnika i da napuni objekat. */
class UserDAL{
	public function GetUser($username,$password){
		$query= sprintf("select k.id_korisnik,k.ime,k.prezime,k.username,k.email,k.password,k.poslednje_logovanje,k.id_status
						from korisnik as k
						where k.username = '%s' and k.password = '%s' ",$username,$password);

		$userResult=QueryBuilder::Select($query);
		if ($userResult != null && is_array($userResult) && count($userResult)==1) {
			$user=new UserDM();
			$userArray=$userResult[0];
			$user->SetUser($userArray["id_korisnik"],$userArray["ime"],$userArray["prezime"],$userArray["username"],$userArray["email"],$userArray["password"],$userArray["poslednje_logovanje"],$userArray["id_status"]);
		}
		return isset($user) ? $user : null;
	}
	public function UpdateLoginTime($userID){
		$params=['poslednje_logovanje' => date('Y-m-d H:i:s')];
		QueryBuilder::Update('korisnik', $userID, $params);
	}
	public function InsertUser($user){
		$params=[
				'ime' => $user->Getime(),
				'prezime' => $user->Getprezime(),
				'username' => $user->Getusername(),
				'email' => $user->Getemail(),
				'password' => $user->getpassword(),
				'poslednje_logovanje' => date('Y-m-d H:i:s'),
				'id_status' => 1
					];
			QueryBuilder::Insert("korisnik", $params);
			header("location:login.php");
			exit();
	}

	public function GetProfile($userID){
		$query= sprintf("select k.id_korisnik,k.ime,k.prezime,k.username,k.email,k.password,k.poslednje_logovanje,k.id_status
						from korisnik as k
						where k.id_korisnik = '%s' ",$userID);

		$userResult=QueryBuilder::Select($query);
			if ($userResult != null && is_array($userResult) && count($userResult)==1) {
			$user=new UserDM();
			$userArray=$userResult[0];
			$user->SetUser($userArray["id_korisnik"],$userArray["ime"],$userArray["prezime"],$userArray["username"],$userArray["email"],$userArray["password"],$userArray["poslednje_logovanje"],$userArray["id_status"]);
	}
		return isset($user) ? $user : null;
	}

	public function UpdateProfile($user){
				$params=[
				'ime' => $user->Getime(),
				'prezime' => $user->Getprezime(),
				'username' => $user->Getusername(),
				'email' => $user->Getemail(),
				'password' => $user->getpassword()
					];
			QueryBuilder::Update("korisnik", $_SESSION['id'] ,$params);
			header("location:index.php");
			exit();
	}

	public function DeleteProfile(){
		QueryBuilder::Delete("korisnik", $_SESSION['id']);
	}
}

 ?>