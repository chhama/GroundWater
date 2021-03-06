<?php

class TubewellController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	public function index()
	{
		if(Input::get('sort')) { $filter = Input::get('sort'); } else { $filter="tubewell_code"; }
		$tubewellAll = Tubewell::orderBy($filter,'asc')->paginate();
		$index = $tubewellAll->getPerPage() * ($tubewellAll->getCurrentPage()-1) + 1;

		return View::make('tubewell.index')
					->with(array(
							'tubewellAll'=>$tubewellAll,
							'index' => $index
						  ));


	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$districtAll = District::orderBy('name','asc')->lists('name','id');
		$blockAll = Block::orderBy('name','asc')->lists('name','id');
		$panchayatAll = Panchayat::orderBy('name','asc')->lists('name','id');
		$officeZoneAll = OfficeZone::orderBy('name','asc')->lists('name','id');
		$officeCircleAll = OfficeCircle::orderBy('name','asc')->lists('name','id');
		$officeSectionAll = OfficeSection::orderBy('name','asc')->lists('name','id');
		$officeDivisionAll = OfficeDivision::orderBy('name','asc')->lists('name','id');
		$officeSubDivisionAll = OfficeSubDivision::orderBy('name','asc')->lists('name','id');
		$deliveryAll = Delivery::orderBy('name','asc')->lists('name','id');
		return View::make('tubewell.create')
					->with(array('districtAll'=>$districtAll,
								 'blockAll'=>$blockAll,
								 'panchayatAll'=>$panchayatAll,
								 'officeZoneAll'=>$officeZoneAll,
								 'officeCircleAll'=>$officeCircleAll,
								 'officeSectionAll'=>$officeSectionAll,
								 'officeDivisionAll'=>$officeDivisionAll,
								 'officeSubDivisionAll'=>$officeSubDivisionAll,
								 'deliveryAll' => $deliveryAll
								 ));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$tubewell = new Tubewell();
		$tubewell->tubewell_code = Input::get('tubewell_code') ;
		$tubewell->delivery_id = Input::get('delivery_id') ;
		$tubewell->district_id = Input::get('district_id') ;
		$tubewell->block_id = Input::get('block_id') ;
		$tubewell->panchayat_id = Input::get('panchayat_id') ;
		$tubewell->location = Input::get('location') ;
		$tubewell->sub_location = Input::get('sub_location') ;
		$tubewell->landmark = Input::get('landmark') ;
		$tubewell->latitude = Input::get('latitude') ;
		$tubewell->longitude = Input::get('longitude') ;
		$tubewell->elevation = Input::get('elevation') ;
		$tubewell->office_zone_id = Input::get('office_zone_id') ;
		$tubewell->office_circle_id = Input::get('office_circle_id') ;
		$tubewell->office_division_id = Input::get('office_division_id') ;
		$tubewell->office_sub_division_id = Input::get('office_sub_division_id') ;
		$tubewell->office_section_id = Input::get('office_section_id') ;
		$tubewell->depth_swl = Input::get('depth_swl') ;
		$tubewell->depth_boring = Input::get('depth_boring') ;
		$tubewell->size_boring = Input::get('size_boring') ;
		$tubewell->run_hr_rig = Input::get('run_hr_rig') ;
		$tubewell->run_hr_compressor = Input::get('run_hr_compressor') ;
		$tubewell->drilling_date = Input::get('drilling_date') ;
		$tubewell->drill_status = Input::get('drill_status') ;
		$tubewell->casing_pipe = Input::get('casing_pipe') ;
		$tubewell->riser_pipe = Input::get('riser_pipe') ;
		$tubewell->no_person_benefit = Input::get('no_person_benefit') ;
		$tubewell->commission_date = Input::get('commission_date') ;
		$tubewell->discharge = Input::get('discharge') ;
		$tubewell->platform = Input::get('platform') ;
		$tubewell->well_status = Input::get('well_status') ;
		if(Input::get('well_status') == 'Damage') {
			$tubewell->well_status_date = Input::get('well_status_date');
			$tubewell->well_status_note = Input::get('well_status_note');
			$tubewell->well_status_nature_damage = Input::get('well_status_nature_damage');
			$tubewell->well_status_action = Input::get('well_status_action');
			$tubewell->well_status_repaired_date = Input::get('well_status_repaired_date');
			$tubewell->well_status_repaired_by = Input::get('well_status_repaired_by');
		}
		if(Input::get('well_status') == 'Defunct') {
			$tubewell->well_status_date = Input::get('well_status_date');
			$tubewell->well_status_note = Input::get('well_status_note');
		}
		$tubewell->save();

		return Redirect::route('tubewell.edit',$tubewell->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tubewellById = Tubewell::find($id);
		$districtAll = District::orderBy('name','asc')->lists('name','id');
		$blockAll = Block::orderBy('name','asc')->lists('name','id');
		$panchayatAll = Panchayat::orderBy('name','asc')->lists('name','id');
		$officeZoneAll = OfficeZone::orderBy('name','asc')->lists('name','id');
		$officeCircleAll = OfficeCircle::orderBy('name','asc')->lists('name','id');
		$officeSectionAll = OfficeSection::orderBy('name','asc')->lists('name','id');
		$officeDivisionAll = OfficeDivision::orderBy('name','asc')->lists('name','id');
		$officeSubDivisionAll = OfficeSubDivision::orderBy('name','asc')->lists('name','id');
		$deliveryAll = Delivery::orderBy('name','asc')->lists('name','id');
		
		return View::make('tubewell.edit')
					->with(array('districtAll'=>$districtAll,
								 'blockAll'=>$blockAll,
								 'panchayatAll'=>$panchayatAll,
								 'officeZoneAll'=>$officeZoneAll,
								 'officeCircleAll'=>$officeCircleAll,
								 'officeSectionAll'=>$officeSectionAll,
								 'officeDivisionAll'=>$officeDivisionAll,
								 'officeSubDivisionAll'=>$officeSubDivisionAll,
								 'deliveryAll' => $deliveryAll,
								 'tubewellById' => $tubewellById
								 ));	
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tubewell = Tubewell::find($id);
		$tubewell->tubewell_code = Input::get('tubewell_code') ;
		$tubewell->delivery_id = Input::get('delivery_id') ;
		$tubewell->district_id = Input::get('district_id') ;
		$tubewell->block_id = Input::get('block_id') ;
		$tubewell->panchayat_id = Input::get('panchayat_id') ;
		$tubewell->location = Input::get('location') ;
		$tubewell->sub_location = Input::get('sub_location') ;
		$tubewell->landmark = Input::get('landmark') ;
		$tubewell->latitude = Input::get('latitude') ;
		$tubewell->longitude = Input::get('longitude') ;
		$tubewell->elevation = Input::get('elevation') ;
		$tubewell->office_zone_id = Input::get('office_zone_id') ;
		$tubewell->office_circle_id = Input::get('office_circle_id') ;
		$tubewell->office_division_id = Input::get('office_division_id') ;
		$tubewell->office_sub_division_id = Input::get('office_sub_division_id') ;
		$tubewell->office_section_id = Input::get('office_section_id') ;
		$tubewell->depth_swl = Input::get('depth_swl') ;
		$tubewell->depth_boring = Input::get('depth_boring') ;
		$tubewell->size_boring = Input::get('size_boring') ;
		$tubewell->drilling_date = Input::get('drilling_date') ;
		$tubewell->drill_status = Input::get('drill_status') ;
		$tubewell->casing_pipe = Input::get('casing_pipe') ;
		$tubewell->riser_pipe = Input::get('riser_pipe') ;
		$tubewell->no_person_benefit = Input::get('no_person_benefit') ;
		$tubewell->commission_date = Input::get('commission_date') ;
		$tubewell->run_hr_rig = Input::get('run_hr_rig') ;
		$tubewell->run_hr_compressor = Input::get('run_hr_compressor') ;
		$tubewell->discharge = Input::get('discharge') ;
		$tubewell->platform = Input::get('platform') ;
		$tubewell->well_status = Input::get('well_status') ;
		if(Input::get('well_status') == 'Damage') {
			$tubewell->well_status_date = Input::get('well_status_date');
			$tubewell->well_status_note = Input::get('well_status_note');
			$tubewell->well_status_nature_damage = Input::get('well_status_nature_damage');
			$tubewell->well_status_action = Input::get('well_status_action');
			$tubewell->well_status_repaired_date = Input::get('well_status_repaired_date');
			$tubewell->well_status_repaired_by = Input::get('well_status_repaired_by');
		}
		if(Input::get('well_status') == 'Defunct') {
			$tubewell->well_status_date = Input::get('well_status_date');
			$tubewell->well_status_note = Input::get('well_status_note');
		}
		$tubewell->save();

		return Redirect::route('tubewell.edit',$tubewell->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tubewell::destroy($id);
		return Redirect::route('tubewell.index');
	}

	

	public function block(){
		$id = Input::get('id');
		$blockByDist = Block::where('district_id','=',$id)->lists('name','id');
		echo "<option></option>";
		foreach ($blockByDist as $id => $name) {
			echo "<option value='$id'>$name</option>";
		}
	}

	public function panchayat(){
		$id = Input::get('id');
		$panchayatByBlock = Panchayat::where('block_id','=',$id)->lists('name','id');
		echo "<option></option>";
		foreach ($panchayatByBlock as $id => $name) {
			echo "<option value='$id'>$name</option>";
		}
	}

	public function circle(){
		$id = Input::get('id');
		$circleByZone = OfficeCircle::where('office_zone_id','=',$id)->lists('name','id');
		echo "<option></option>";
		foreach ($circleByZone as $id => $name) {
			echo "<option value='$id'>$name</option>";
		}
	}

	public function division(){
		$id = Input::get('id');
		$divByCircle = OfficeDivision::where('office_circle_id','=',$id)->lists('name','id');
		echo "<option></option>";
		foreach ($divByCircle as $id => $name) {
			echo "<option value='$id'>$name</option>";
		}
	}

	public function subdivision(){
		$id = Input::get('id');
		$subdivByDiv = OfficeSubDivision::where('office_division_id','=',$id)->lists('name','id');
		echo "<option></option>";
		foreach ($subdivByDiv as $id => $name) {
			echo "<option value='$id'>$name</option>";
		}
	}

	public function section(){
		$id = Input::get('id');
		$secBySubdiv = OfficeSection::where('office_sub_division_id','=',$id)->lists('name','id');
		echo "<option></option>";
		foreach ($secBySubdiv as $id => $name) {
			echo "<option value='$id'>$name</option>";
		}
	}

	public function status(){
		$id = Input::get('id');
		if($id == 'Damage') {
			return View::make('tubewell.damage');
		}
		if($id == 'Defunct'){
			return View::make('tubewell.defunction');
		}
	}
}
