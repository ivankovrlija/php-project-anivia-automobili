<?php 

class GorivoBM{
	private $_id_gorivo;
	private $_gorivo;

	public function Get_id_gorivo(){
		return $this->_id_gorivo;
	}
	public function Get_gorivo(){
		return $this->_gorivo;
	}

		public function Set_id_gorivo($_id_gorivo){
		$this->_id_gorivo=$_id_gorivo;
	}
	public function Set_gorivo($_gorivo){
		$this->_gorivo=$_gorivo;
	}

		public function SetGas($_id_gorivo,$_gorivo){
			$this->_id_gorivo = $_id_gorivo;
			$this->_gorivo = $_gorivo;
	}
}
 ?>