<?php 

class MarkeBM{
	private $_id_marke;
	private $_marke;

	public function Get_id_marke(){
		return $this->_id_marke;
	}
	public function Get_marke(){
		return $this->_marke;
	}

	public function Set_id_marke($_id_marke){
		$this->_id_marke=$_id_marke;
	}
	public function Set_marke($_marke){
		$this->_marke=$_marke;
	}

	public function SetMarks($_id_marke,$_marke){
		$this->_id_marke = $_id_marke;
		$this->_marke = $_marke;
	}
}
 ?>