<?php

class ReportController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tubewell()
	{
		$filter = array(
						'tubewell'		=> 'No of Tubewell',
						'deliveries'	=> 'Mode of Delivery',
						'cezone'		=> 'CE Zone Office',
						'circle'		=> 'Circle Office',
						'division'		=> 'Division Office',
						'subdivision'	=> 'Sub Division Office',
						'section'		=> 'Section Office',
						'discharge'		=> 'Discharge',
						'depthswl'		=> 'Depth of SWL',
						'depthboring'	=> 'Depth of Borehole',
						'sizeboring'	=> 'Diameter of Borehole',
						'platform'		=> 'Platform',
						'district'		=> 'District Wise',
						'block'			=> 'Block Wise',
						'panchayat'		=> 'Panchayat/Village/Habitation Wise',
						'tubewellstatus'=> 'Tubewell Status'
						);

		$reports	= Tubewell::select(DB::raw('COUNT(*) AS countRow'))->get();
		$label 		= 'Depth of Borehole';
		return View::make('report.filtertubewell')->with(array(
										'reports'	=> $reports,
										'filter'	=> $filter,
										'label'		=> $label
										));
		
	}

	public function listtubewell(){
		$report 	= Input::get('report');
		$name		= Input::get('name');
		$depthFrom	= Input::get('from');
		$depthTo	= Input::get('to');
		$operator	= '=';

		if($report == 'tubewell'){
			$where 			= 'id';
			$whereBetween	= 'depth_boring';
			$operator		= '>';
			$name 			= 0;
		}

		if($report == 'deliveries') {
			$where 			= 'delivery_id';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'cezone') {
			$where 			= 'office_zone_id';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'circle'){
			$where 			= 'office_circle_id';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'division'){
			$where 			= 'office_division_id';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'subdivision'){
			$where 			= 'office_sub_division_id';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'section'){
			$where 			= 'office_section_id';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'district'){
			$where 			= 'district_id';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'block'){
			$where 			= 'block_id';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'panchayat'){
			$where 			= 'panchayat_id';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'discharge'){
			$where 			= 'discharge';
			$whereBetween	= 'discharge';
		}

		if($report == 'depthswl'){
			$where 			= 'depth_swl';
			$whereBetween	= 'depth_swl';
		}

		if($report == 'depthboring'){
			$where 			= 'depth_boring';
			$whereBetween	= 'depth_boring';
		}

		if($report == 'sizeboring'){
			$where 			= 'size_boring';
			$whereBetween	= 'size_boring';
		}

		if($report == 'platform'){
			$where 			= 'platform';
			$whereBetween	= 'platform';
		}

		if($report == 'tubewellstatus'){
			$where 			= 'tubewell_status';
			$whereBetween	= 'tubewell_status';
		}

		$tubewellAll= Tubewell::where($where,$operator,$name)
					->where(function($query){
						if(!empty($from) && !empty($to)){ $query->whereBetween($whereBetween,array($from,$to)); }
						if(!empty($from) && empty($to)){ $query->whereBetween($whereBetween,array($from,0)); }
						if(empty($from) && !empty($to)){ $query->whereBetween($whereBetween,array(0,$to)); }
					})
					->orderBy('tubewell_code')
					->paginate();
		

		$index = $tubewellAll->getPerPage() * ($tubewellAll->getCurrentPage()-1) + 1;
		return View::make('report.listtubewell')
						->with(array(
							'tubewellAll'	=> $tubewellAll,
							'index'			=> $index
						));
	}

	public function filtertubewell() {
		$filter = array(
						'tubewell'		=> 'No of Tubewell',
						'deliveries'	=> 'Mode of Delivery',
						'cezone'		=> 'CE Zone Office',
						'circle'		=> 'Circle Office',
						'division'		=> 'Division Office',
						'subdivision'	=> 'Sub Division Office',
						'section'		=> 'Section Office',
						'discharge'		=> 'Discharge',
						'depthswl'		=> 'Depth of SWL',
						'depthboring'	=> 'Depth of Borehole',
						'sizeboring'	=> 'Diameter of Borehole',
						'platform'		=> 'Platform',
						'district'		=> 'District Wise',
						'block'			=> 'Block Wise',
						'panchayat'		=> 'Panchayat/Village/Habitation Wise',
						'tubewellstatus'=> 'Tubewell Status'
						);

		$searchValue = Input::get('report');

		$tubewell_table 			= (new Tubewell)->getTable();
		$delivery_table				= (new Delivery)->getTable();
		$office_zone_table			= (new OfficeZone)->getTable();
		$office_circle_table		= (new OfficeCircle)->getTable();
		$office_division_table		= (new OfficeDivision)->getTable();
		$office_sub_division_table	= (new OfficeSubDivision)->getTable();
		$office_section_table		= (new OfficeSection)->getTable();
		$district_table				= (new District)->getTable();
		$block_table				= (new Block)->getTable();
		$panchayat_table			= (new Panchayat)->getTable();

		$from 	= Input::get('from');
		$to 	= Input::get('to');
			
		if($searchValue == 'tubewell' || $searchValue == ""){
			$reports 	= Tubewell::select(DB::raw('COUNT(*) AS countRow'))->get();
			$label		= "Depth of Borehole";
		} 

		if($searchValue == 'deliveries'){
			$reports = Tubewell::join($delivery_table,$delivery_table.'.id','=',$tubewell_table.'.delivery_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$delivery_table.'.name AS name,'.$tubewell_table.'.delivery_id AS nameId'))
								->whereBetween("depth_boring",array($from,$to))
								->groupBy($delivery_table.'.id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'cezone'){
			$reports = Tubewell::join($office_zone_table,$office_zone_table.'.id','=',$tubewell_table.'.office_zone_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_zone_table.'.name AS name,'.$tubewell_table.'.office_zone_id AS nameId'))
								->groupBy($tubewell_table.'.office_zone_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'circle'){
			$reports = Tubewell::join($office_circle_table,$office_circle_table.'.id','=',$tubewell_table.'.office_circle_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_circle_table.'.name AS name,'.$tubewell_table.'.office_circle_id AS nameId'))
								->groupBy($tubewell_table.'.office_circle_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'division'){
			$reports = Tubewell::join($office_division_table,$office_division_table.'.id','=',$tubewell_table.'.office_division_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_division_table.'.name AS name,'.$tubewell_table.'.office_division_id AS nameId'))
								->groupBy($tubewell_table.'.office_division_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'subdivision'){
			$reports = Tubewell::join($office_sub_division_table,$office_sub_division_table.'.id','=',$tubewell_table.'.office_sub_division_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_sub_division_table.'.name AS name,'.$tubewell_table.'.office_sub_division_id AS nameId'))
								->groupBy($tubewell_table.'.office_sub_division_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'section'){
			$reports = Tubewell::join($office_section_table,$office_section_table.'.id','=',$tubewell_table.'.office_section_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_section_table.'.name AS name,'.$tubewell_table.'.office_section_id AS nameId'))
								->groupBy($tubewell_table.'.office_section_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'district'){
			$reports = Tubewell::join($district_table,$district_table.'.id','=',$tubewell_table.'.district_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$district_table.'.name AS name,'.$tubewell_table.'.district_id AS nameId'))
								->groupBy($tubewell_table.'.district_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'block'){
			$reports = Tubewell::join($block_table,$block_table.'.id','=',$tubewell_table.'.block_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$block_table.'.name AS name,'.$tubewell_table.'.block_id AS nameId'))
								->groupBy($tubewell_table.'.block_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'panchayat'){
			$reports = Tubewell::join($panchayat_table,$panchayat_table.'.id','=',$tubewell_table.'.panchayat_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$panchayat_table.'.name AS name,'.$tubewell_table.'.panchayat_id AS nameId'))
								->groupBy($tubewell_table.'.panchayat_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'discharge'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, discharge AS name, discharge AS nameId'))
								->groupBy('discharge')
								->orderBy('name')
								->get();
		}

		if($searchValue == 'depthswl'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, depth_swl AS name, depth_swl AS nameId'))
								->groupBy('depth_swl')
								->orderBy('name')
								->get();
		}

		if($searchValue == 'depthboring'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, depth_boring AS name, depth_boring AS nameId'))
								->groupBy('depth_boring')
								->orderBy('name')
								->get();
		}

		if($searchValue == 'sizeboring'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, size_boring AS name, size_boring AS nameId'))
								->groupBy('size_boring')
								->orderBy('name')
								->get();
		}

		if($searchValue == 'platform'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, platform AS name, platform AS nameId'))
								->groupBy('platform')
								->orderBy('name')
								->get();
		}

		if($searchValue == 'tubewellstatus'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, well_status AS name, well_status AS nameId'))
								->groupBy('well_status')
								->orderBy('name')
								->get();
		}
		!isset($label)?$label='':$label=$label;
		return View::make('report.filtertubewell')->with(array(
											'reports'	=> $reports,
											'filter'	=> $filter,
											'label'		=> $label
											));
		
	}

	public function tubewellstatus(){
		$date1 = Input::get('date1');
		$date2 = Input::get('date2');

		if(isset($date1) || isset($date1)) {
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, well_status AS name'))
							->whereBetween('well_status_date',array($date1,$date2))
							->groupBy('well_status')
							->get();
		} else {
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, well_status AS name'))
							->groupBy('well_status')
							->get();

		}
		

		return View::make('report.tubewellstatus')->with(array(
											'reports'	=> $reports
											));
		
	}

}
