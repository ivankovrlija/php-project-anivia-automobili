<?php 
/*data model klasa koja ima atribute koji odgovaraju bazi i koja popunjava objekat. */
class UserDM{
	private $id_korisnik;
	private $ime;
	private $prezime;
	private $username;
	private $email;
	private $password;
	private $poslednje_logovanje;
	private $id_status;
	/* GET METODE */
	public function Getid_korisnik(){
		return $this->id_korisnik;
	}
	public function Getime(){
		return $this->ime;
	}
	public function Getprezime(){
		return $this->prezime;
	}
	public function Getusername(){
		return $this->username;
	}
	public function Getemail(){
		return $this->email;
	}
	public function Getpassword(){
		return $this->password;
	}
	public function Getposlednje_logovanje(){
		return $this->poslednje_logovanje;
	}
	public function Getid_status(){
		return $this->id_status;
	}
	/* SET METODE */
	public function Setid_korisnik($id_korisnik){
		$this->id_korisnik=$id_korisnik;
	}
	public function Setime($ime){
		$this->ime=$ime;
	}
	public function Setprezime($prezime){
		$this->prezime=$prezime;
	}
	public function Setusername($username){
		$this->username=$username;
	}
	public function Setemail($email){
		$this->email=$email;
	}
	public function Setpassword($password){
		$this->password=$password;
	}
	public function Setposlednje_logovanje($poslednje_logovanje){
		$this->poslednje_logovanje=$poslednje_logovanje;
	}
	public function Setid_status($id_status){
		$this->id_status=$id_status;
	}
	/* mapUserFromDB prima jedan niz, koji ima kolone koji odgovaraju nazivima atributa i treba da ih popuni. */
	public function SetUser($id_korisnik,$ime,$prezime,$username,$email,$password,$poslednje_logovanje,$id_status){
		$this->Setid_korisnik($id_korisnik);
		$this->Setime($ime);
		$this->Setprezime($prezime);
		$this->Setusername($username);
		$this->Setemail($email);
		$this->Setpassword($password);
		$this->Setposlednje_logovanje($poslednje_logovanje);
		$this->Setid_status($id_status);
	}
}



 ?>