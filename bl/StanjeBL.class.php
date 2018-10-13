<?php 
include_once("../dal/OglasDAL.class.php");
include_once("../bm/StanjeBM.class.php");

class StanjeBL{
	public function GetStanje(){
		$stateDAL= new OglasDAL();
		$statesDM= $stateDAL->GetStanje();

		$states= $this->MapStatesDM2BM($statesDM);
		return $states;
	}
		private function MapStatesDM2BM($statesDM){
			if ($statesDM != null && is_array($statesDM) && count($statesDM) > 0) {
				foreach ($statesDM as $stateDM) {
					$stateBM = new StanjeBM();
					$stateBM->SetStanje($stateDM->Getid_stanje_vozila(), $stateDM->Getstanje_vozila());
					$states[] = $stateBM;
				}
			}
			return isset($states) ? $states : null;
		}
}
 ?>