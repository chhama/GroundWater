<?php  

	class MapController extends \BaseController {
		public function getLatlong($id)
		{


			$lat=Tubewell::where('tubewell_code','=',$id)->select('latitude')->first();
			$longi=Tubewell::where('tubewell_code','=',$id)->select('latitude')->first();

			$arrvalue=array($lat,$longi);
			
			echo json_encode($arrvalue);
		}
	}


