<?php 

class GorivoDM{
	private $id_gorivo;
	private $gorivo;

	public function Getid_gorivo(){
		return $this->id_gorivo;
	}
	public function Getgorivo(){
		return $this->gorivo;
	}

	public function Setid_gorivo($id_gorivo){
		$this->id_gorivo=$id_gorivo;
	}
	public function Setgorivo($gorivo){
		$this->gorivo=$gorivo;
	}
/* mapGorivoFromDB prima jedan niz, koji ima kolone koji odgovaraju nazivima atributa i treba da ih popuni. */
		public function SetGas($id_gorivo,$gorivo){
		$this->id_gorivo = $id_gorivo;
		$this->gorivo = $gorivo;
	}
}
 ?>