<?php 

class OglasDM{
	private $id_oglas;
	private $id_marke;
	private $id_stanje_vozila;
	private $id_gorivo;
	private $godiste;
	private $cena;
	private $kontakt;
	private $kilometraza;
	private $slika_oglasa;
	private $opis;
	private $id_korisnik;

	public function Getid_oglas(){
		return $this->id_oglas;
	}
	public function Getid_marke(){
		return $this->id_marke;
	}
	public function Getid_stanje_vozila(){
		return $this->id_stanje_vozila;
	}
	public function Getid_gorivo(){
		return $this->id_gorivo;
	}
	public function Getgodiste(){
		return $this->godiste;
	}
	public function Getcena(){
		return $this->cena;
	}
	public function Getkontakt(){
		return $this->kontakt;
	}
	public function Getkilometraza(){
		return $this->kilometraza;
	}
	public function Getslika_oglasa(){
		return $this->slika_oglasa;
	}
	public function Getopis(){
		return $this->opis;
	}
	public function Getid_korisnik(){
		return $this->id_korisnik;
	}

	public function Setid_oglas($id_oglas){
		$this->id_oglas=$id_oglas;
	}
	public function Setid_marke($id_marke){
		$this->id_marke=$id_marke;
	}
	public function Setid_stanje_vozila($id_stanje_vozila){
		$this->id_stanje_vozila=$id_stanje_vozila;
	}
	public function Setid_gorivo($id_gorivo){
		$this->id_gorivo=$id_gorivo;
	}
	public function Setgodiste($godiste){
		$this->godiste=$godiste;
	}
	public function Setcena($cena){
		$this->cena=$cena;
	}
	public function Setkontakt($kontakt){
		$this->kontakt=$kontakt;
	}
	public function Setkilometraza($kilometraza){
		$this->kilometraza=$kilometraza;
	}
	public function Setslika_oglasa($slika_oglasa){
		$this->slika_oglasa=$slika_oglasa;
	}
	public function Setopis($opis){
		$this->opis=$opis;
	}
	public function Setid_korisnik($id_korisnik){
		$this->id_korisnik=$id_korisnik;
	}

	/* mapOglasFromDB prima jedan niz, koji ima kolone koji odgovaraju nazivima atributa i treba da ih popuni. */
	public function LoadOglas($id_oglas,$id_marke,$id_stanje_vozila,$id_gorivo,$godiste,$cena,$kontakt,$kilometraza,$slika_oglasa,$opis,$id_korisnik){
		$this->id_oglas=$id_oglas;
		$this->id_marke=$id_marke;
		$this->id_stanje_vozila=$id_stanje_vozila;
		$this->id_gorivo=$id_gorivo;
		$this->godiste=$godiste;
		$this->cena=$cena;
		$this->kontakt=$kontakt;
		$this->kilometraza=$kilometraza;
		$this->slika_oglasa=$slika_oglasa;
		$this->opis=$opis;
		$this->id_korisnik=$id_korisnik;
	}
	public function SetPictures($cena,$slika_oglasa){
		$this->cena=$cena;
		$this->slika_oglasa = $slika_oglasa;
	}
}

 ?>