<?php 

class StanjeDM{
	private $id_stanje_vozila;
	private $stanje_vozila;

	public function Getid_stanje_vozila(){
		return $this->id_stanje_vozila;
	}
		public function Getstanje_vozila(){
		return $this->stanje_vozila;
	}

	public function Setid_stanje_vozila($id_stanje_vozila){
		$this->id_stanje_vozila=$id_stanje_vozila;
	}
		public function Setstanje_vozila($stanje_vozila){
		$this->stanje_vozila=$stanje_vozila;
	}
/* mapStanjeFromDB prima jedan niz, koji ima kolone koji odgovaraju nazivima atributa i treba da ih popuni. */
		public function SetStanje($id_stanje_vozila,$stanje_vozila){
		$this->id_stanje_vozila=$id_stanje_vozila;
		$this->stanje_vozila=$stanje_vozila;
	}
}
 ?>