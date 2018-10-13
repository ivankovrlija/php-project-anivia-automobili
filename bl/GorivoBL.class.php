<?php 
include_once("../dal/OglasDAL.class.php");
include_once("../bm/GorivoBM.class.php");

class GorivoBL{
	public function GetGas(){
		$gasDAL = new OglasDAL();
		$gasesDM = $gasDAL->GetGas();

		$gases = $this->MapGasDM2BM($gasesDM);
		return $gases;
	}

	private function MapGasDM2BM($gasesDM){
		if ($gasesDM != null && is_array($gasesDM) && count($gasesDM)) {
			foreach ($gasesDM as $gasDM) {
				$gasBM = new GorivoBM();
				$gasBM->SetGas($gasDM->Getid_gorivo(), $gasDM->Getgorivo());
				$gases[]=$gasBM;
			}
		}
		return isset($gases) ? $gases : null;
	}
}
 ?>