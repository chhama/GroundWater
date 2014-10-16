<?php  

	class MapController extends \BaseController {
		public function getLatlong()
		{
			$id = Input::get('id');
			$lat=Tubewell::where('tubewell_code','=',$id)->select('latitude','longitude')->first();
			$water=WaterQuality::where('tubewell_id','=',$id)->first();
			/*$longi=Tubewell::where('tubewell_code','=',$id)->select('longitude')->first();

			*/
			$arrvalue=array($lat->latitude,$lat->longitude,$water->ph,$water->colour,$water->odour);
			echo json_encode($arrvalue);
		}
	}


