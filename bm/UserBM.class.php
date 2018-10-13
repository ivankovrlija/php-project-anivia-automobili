<?php 

class UserBM{
	private $_ime;
	private $_prezime;
	private $_username;
	private $_email;
	private $_password;

	public function Get_ime(){
		return $this->_ime;
	}
	public function Get_prezime(){
		return $this->_prezime;
	}
	public function Get_username(){
		return $this->_username;
	}
	public function Get_email(){
		return $this->_email;
	}
	public function Get_password(){
		return $this->_password;
	}

	public function SetNewUser($_ime,$_prezime,$_username,$_email,$_password){
		$this->_ime=$_ime;
		$this->_prezime=$_prezime;
		$this->_username=$_username;
		$this->_email=$_email;
		$this->_password=$_password;
	}
}

 ?>