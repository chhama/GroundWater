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
		$this->from	= Input::get('from');
		$this->to	= Input::get('to');
		$operator	= '=';

		if($report == 'tubewell'){
			$this->where 			= 'id';
			$this->whereBetween		= 'depth_boring';
			$operator		= '>';
			$name 			= 0;
		}

		if($report == 'deliveries') {
			$this->where	= 'delivery_id';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'cezone') {
			$this->where 			= 'office_zone_id';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'circle'){
			$this->where 			= 'office_circle_id';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'division'){
			$this->where 			= 'office_division_id';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'subdivision'){
			$this->where 			= 'office_sub_division_id';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'section'){
			$this->where 			= 'office_section_id';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'district'){
			$this->where 			= 'district_id';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'block'){
			$this->where 			= 'block_id';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'panchayat'){
			$this->where 			= 'panchayat_id';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'discharge'){
			$this->where 			= 'discharge';
			$this->whereBetween	= 'discharge';
		}

		if($report == 'depthswl'){
			$this->where 			= 'depth_swl';
			$this->whereBetween	= 'depth_swl';
		}

		if($report == 'depthboring'){
			$this->where 			= 'depth_boring';
			$this->whereBetween	= 'depth_boring';
		}

		if($report == 'sizeboring'){
			$this->where 			= 'size_boring';
			$this->whereBetween	= 'size_boring';
		}

		if($report == 'platform'){
			$this->where 			= 'platform';
			$this->whereBetween	= 'platform';
		}

		if($report == 'tubewellstatus'){
			$this->where 			= 'tubewell_status';
			$this->whereBetween	= 'tubewell_status';
		}
		
		$tubewellAll= Tubewell::where($this->where,$operator,$name)
					->where(function($query){
						if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($this->whereBetween,array($this->from,$this->to)); }
						if(!empty($this->from) && empty($this->to)){ $query->whereBetween($this->whereBetween,array($this->from,0)); }
						if(empty($this->from) && !empty($this->to)){ $query->whereBetween($this->whereBetween,array(0,$this->to)); }
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

		$this->from 		= Input::get('from');
		$this->to 			= Input::get('to');
			
		if($searchValue == 'tubewell' || $searchValue == ""){
			$reports 	= Tubewell::select(DB::raw('COUNT(*) AS countRow'))->get();
			$label		= "Depth of Borehole";
		} 

		if($searchValue == 'deliveries'){
			$reports = Tubewell::join($delivery_table,$delivery_table.'.id','=',$tubewell_table.'.delivery_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$delivery_table.'.name AS name,'.$tubewell_table.'.delivery_id AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy($delivery_table.'.id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'cezone'){
			$reports = Tubewell::join($office_zone_table,$office_zone_table.'.id','=',$tubewell_table.'.office_zone_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_zone_table.'.name AS name,'.$tubewell_table.'.office_zone_id AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy($tubewell_table.'.office_zone_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'circle'){
			$reports = Tubewell::join($office_circle_table,$office_circle_table.'.id','=',$tubewell_table.'.office_circle_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_circle_table.'.name AS name,'.$tubewell_table.'.office_circle_id AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy($tubewell_table.'.office_circle_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'division'){
			$reports = Tubewell::join($office_division_table,$office_division_table.'.id','=',$tubewell_table.'.office_division_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_division_table.'.name AS name,'.$tubewell_table.'.office_division_id AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy($tubewell_table.'.office_division_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'subdivision'){
			$reports = Tubewell::join($office_sub_division_table,$office_sub_division_table.'.id','=',$tubewell_table.'.office_sub_division_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_sub_division_table.'.name AS name,'.$tubewell_table.'.office_sub_division_id AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy($tubewell_table.'.office_sub_division_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'section'){
			$reports = Tubewell::join($office_section_table,$office_section_table.'.id','=',$tubewell_table.'.office_section_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$office_section_table.'.name AS name,'.$tubewell_table.'.office_section_id AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy($tubewell_table.'.office_section_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'district'){
			$reports = Tubewell::join($district_table,$district_table.'.id','=',$tubewell_table.'.district_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$district_table.'.name AS name,'.$tubewell_table.'.district_id AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy($tubewell_table.'.district_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'block'){
			$reports = Tubewell::join($block_table,$block_table.'.id','=',$tubewell_table.'.block_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$block_table.'.name AS name,'.$tubewell_table.'.block_id AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy($tubewell_table.'.block_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'panchayat'){
			$reports = Tubewell::join($panchayat_table,$panchayat_table.'.id','=',$tubewell_table.'.panchayat_id')
								->select(DB::raw('COUNT('.$tubewell_table.'.id) AS countRow, '.$panchayat_table.'.name AS name,'.$tubewell_table.'.panchayat_id AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy($tubewell_table.'.panchayat_id')
								->orderBy('countRow')
								->get();
			$label		= "Depth of Borehole";
		}

		if($searchValue == 'discharge'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, discharge AS name, discharge AS nameId'))
								->where(function($query){
									$whereBetween	= "discharge";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy('discharge')
								->orderBy('name')
								->get();
		}

		if($searchValue == 'depthswl'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, depth_swl AS name, depth_swl AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_swl";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy('depth_swl')
								->orderBy('name')
								->get();
		}

		if($searchValue == 'depthboring'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, depth_boring AS name, depth_boring AS nameId'))
								->where(function($query){
									$whereBetween	= "depth_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
								->groupBy('depth_boring')
								->orderBy('name')
								->get();
		}

		if($searchValue == 'sizeboring'){
			$reports = Tubewell::select(DB::raw('COUNT(*) AS countRow, size_boring AS name, size_boring AS nameId'))
								->where(function($query){
									$whereBetween	= "size_boring";
									if(!empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,$this->to)); }
									if(!empty($this->from) && empty($this->to)){ $query->whereBetween($whereBetween,array($this->from,0)); }
									if(empty($this->from) && !empty($this->to)){ $query->whereBetween($whereBetween,array(0,$this->to)); }
								})
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


	public function waterqualitylist(){
		
		$waterQualityAll = WaterQuality::orderBy('tubewell_id','asc')->paginate();
		$index = $waterQualityAll->getPerPage() * ($waterQualityAll->getCurrentPage()-1) + 1;

		return View::make('report.waterqualitylist',compact('waterQualityAll','index'));
	}

	public function waterquality($id){
		$waterQualityById = WaterQuality::find($id);
		return View::make('report.waterquality',compact('waterQualityById'));
	}

}
