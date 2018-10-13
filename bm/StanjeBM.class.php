<?php 

class StanjeBM{
	private $_id_stanje_vozila;
	private $_stanje_vozila;

	public function Get_id_stanje_vozila(){
		return $this->_id_stanje_vozila;
	}
	public function Get_stanje_vozila(){
		return $this->_stanje_vozila;
	}

	public function Set_id_stanje_vozila($_id_stanje_vozila){
		$this->_id_stanje_vozila=$_id_stanje_vozila;
	}
	public function Set_stanje_vozila($_stanje_vozila){
		$this->_stanje_vozila=$_stanje_vozila;
	}

	public function SetStanje($_id_stanje_vozila,$_stanje_vozila){
		$this->_id_stanje_vozila = $_id_stanje_vozila;
		$this->_stanje_vozila = $_stanje_vozila;
	}
}
 ?>