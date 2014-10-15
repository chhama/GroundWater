<?php  

	class MapController extends \BaseController {
		public function getLatlong($id)
		{


			$lati= Tubewell::where('tubewell_code','=',1)->select('latitude')->first()->toArray();
			$longi=Tubewell::where('tubewell_code','=',1)->select('latitude')->first();

			$arrvalue=array($lati,$longi);
			// $arrstd=array_map('utf8_encode',$arrvalue);
			echo json_encode($arrvalue);
		}
	}


