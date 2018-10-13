<?php 

class OglasBM{
	private $_id_marke;
	private $_id_stanje_vozila;
	private $_id_gorivo;
	private $_godiste;
	private $_cena;
	private $_kontakt;
	private $_kilometraza;
	private $_slika_oglasa;
	private $_opis_oglasa;
	private $_id_korisnik;

public function Get_id_korisnik(){
		return $this->_id_korisnik;
	}
	public function Get_id_marke(){
		return $this->_id_marke;
	}
		public function Get_id_stanje_vozila(){
		return $this->_id_stanje_vozila;
	}
		public function Get_id_gorivo(){
		return $this->_id_gorivo;
	}
		public function Get_godiste(){
		return $this->_godiste;
	}
		public function Get_cena(){
		return $this->_cena;
	}
		public function Get_kontakt(){
		return $this->_kontakt;
	}
		public function Get_kilometraza(){
		return $this->_kilometraza;
	}
		public function Get_slika_oglasa(){
		return $this->_slika_oglasa;
	}
		public function Get_opis_oglasa(){
		return $this->_opis_oglasa;
	}

	public function SetNewOglas($_id_marke,$_id_stanje_vozila,$_id_gorivo,$_godiste,$_cena,$_kontakt,$_kilometraza,$_slika_oglasa,$_opis_oglasa){
		$this->_id_marke=$_id_marke;
		$this->_id_stanje_vozila=$_id_stanje_vozila;
		$this->_id_gorivo=$_id_gorivo;
		$this->_godiste=$_godiste;
		$this->_cena=$_cena;
		$this->_kontakt=$_kontakt;
		$this->_kilometraza=$_kilometraza;
		$this->_slika_oglasa=$_slika_oglasa;
		$this->_opis_oglasa=$_opis_oglasa;
	}
	public function SetPictures($_cena,$_slika_oglasa){
		$this->_cena=$_cena;
		$this->_slika_oglasa = $_slika_oglasa;
	}
}

 ?>