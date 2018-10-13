<?php 
include_once("../dal/OglasDAL.class.php");
include_once("../bm/MarkeBM.class.php");

class MarkeBL{
	public function GetMarks(){
		$markDAL = new OglasDAL();
		$marksDM = $markDAL->GetMarks();

		$marks= $this->MapMarksDM2BM($marksDM);
		return $marks;
	}
	private function MapMarksDM2BM($marksDM){
		if ($marksDM != null && is_array($marksDM) && count($marksDM) > 0) {
			foreach ($marksDM as $markDM) {
				$markBM = new MarkeBM();
				$markBM->SetMarks($markDM->Getid_marke(), $markDM->Getmarke());
				$marks[] = $markBM;
			}
		}
		return isset($marks) ? $marks : null;
	}
}
 ?>