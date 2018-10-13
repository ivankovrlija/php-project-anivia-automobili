<?php 
class MarkeDM{
	private $id_marke;
	private $marke;

	public function Getid_marke(){
		return $this->id_marke;
	}
	public function Getmarke(){
		return $this->marke;
	}

	public function Setid_marke($id_marke){
		$this->id_marke=$id_marke;
	}
	public function Setmarke($marke){
		$this->marke=$marke;
	}
/* mapMarkeFromDB prima jedan niz, koji ima kolone koji odgovaraju nazivima atributa i treba da ih popuni. */
	public function SetMarks($id_marke,$marke){
		$this->id_marke = $id_marke;
		$this->marke = $marke;
	}
}
 ?>