<?php  

	class MapController extends \BaseController {
		public function getLatlong()
		{
			$id = Input::get('id');
			$lat=Tubewell::where('tubewell_code','=',$id)->first();
			$water=WaterQuality::where('tubewell_id','=',$id)->first();
			$delivery=Delivery::where('id','=',$lat->delivery_id)->first();
			$district=District::where('id','=',$lat->district_id)->first();
			$block=Block::where('id','=',$lat->block_id)->first();
			$panchayat=Panchayat::where('id','=',$lat->panchayat_id)->first();
			$zone=OfficeZone::where('id','=',$lat->office_zone_id)->first();
			$circle=OfficeCircle::where('id','=',$lat->office_circle_id)->first();
			$division=OfficeDivision::where('id','=',$lat->office_division_id)->first();
			$subdivision=OfficeSubDivision::where('id','=',$lat->office_sub_division_id)->first();
			$section=OfficeSection::where('id','=',$lat->office_section_id)->first();
			/*$longi=Tubewell::where('tubewell_code','=',$id)->select('longitude')->first();

			*/
			$arrvalue=array($lat->latitude,$lat->longitude,$lat->tubewell_code,$lat->location,$lat->sub_location,$lat->landmark,$lat->elevation,$lat->depth_swl,$lat->depth_boring,$lat->size_boring,$lat->drilling_date,$lat->commission_date,$lat->discharge,$lat->platform,$lat->well_status,$lat->well_status_date,$lat->well_status_note,$lat->well_status_nature_damage,$lat->well_status_action,$lat->well_status_repaired_date,$lat->well_status_repaired_by,$delivery->name,$district->name,$block->name,$panchayat->name,$zone->name,$circle->name,$division->name,$subdivision->name,$section->name);
			echo json_encode($arrvalue);
		}
	}


