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
		$tubewellAll = Tubewell::orderBy('tubewellCode','asc')->paginate();

		return View::make('tubewell.index')
					->with(array('tubewellAll'=>$tubewellAll));


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
		$tubewell->tubewellCode = Input::get('tubewellCode') ;
		$tubewell->delivery_id = Input::get('delivery_id') ;
		$tubewell->district_id = Input::get('district_id') ;
		$tubewell->block_id = Input::get('block_id') ;
		$tubewell->panchayat_id = Input::get('panchayat_id') ;
		$tubewell->location = Input::get('location') ;
		$tubewell->sub_location = Input::get('sub_location') ;
		$tubewell->landmark = Input::get('landmark') ;
		$tubewell->latitude = Input::get('latitude') ;
		$tubewell->longitude = Input::get('longitude') ;
		$tubewell->allevation = Input::get('allevation') ;
		$tubewell->office_zone_id = Input::get('office_zone_id') ;
		$tubewell->office_circle_id = Input::get('office_circle_id') ;
		$tubewell->office_division_id = Input::get('office_division_id') ;
		$tubewell->office_sub_division_id = Input::get('office_sub_division_id') ;
		$tubewell->office_section_id = Input::get('office_section_id') ;
		$tubewell->depthSWL = Input::get('depthSWL') ;
		$tubewell->depthBoring = Input::get('depthBoring') ;
		$tubewell->sizeBoring = Input::get('sizeBoring') ;
		$tubewell->drillingDate = Input::get('drillingDate') ;
		$tubewell->commissionDate = Input::get('commissionDate') ;
		$tubewell->discharge = Input::get('discharge') ;
		$tubewell->platform = Input::get('platform') ;
		$tubewell->wellStatus = Input::get('wellStatus') ;
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
		//
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
		$tubewell->tubewellCode = Input::get('tubewellCode') ;
		$tubewell->delivery_id = Input::get('delivery_id') ;
		$tubewell->district_id = Input::get('district_id') ;
		$tubewell->block_id = Input::get('block_id') ;
		$tubewell->panchayat_id = Input::get('panchayat_id') ;
		$tubewell->location = Input::get('location') ;
		$tubewell->sub_location = Input::get('sub_location') ;
		$tubewell->landmark = Input::get('landmark') ;
		$tubewell->latitude = Input::get('latitude') ;
		$tubewell->longitude = Input::get('longitude') ;
		$tubewell->allevation = Input::get('allevation') ;
		$tubewell->office_zone_id = Input::get('office_zone_id') ;
		$tubewell->office_circle_id = Input::get('office_circle_id') ;
		$tubewell->office_division_id = Input::get('office_division_id') ;
		$tubewell->office_sub_division_id = Input::get('office_sub_division_id') ;
		$tubewell->office_section_id = Input::get('office_section_id') ;
		$tubewell->depthSWL = Input::get('depthSWL') ;
		$tubewell->depthBoring = Input::get('depthBoring') ;
		$tubewell->sizeBoring = Input::get('sizeBoring') ;
		$tubewell->drillingDate = Input::get('drillingDate') ;
		$tubewell->commissionDate = Input::get('commissionDate') ;
		$tubewell->discharge = Input::get('discharge') ;
		$tubewell->platform = Input::get('platform') ;
		$tubewell->wellStatus = Input::get('wellStatus') ;
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
		echo "Hello"; exit();
		$id = Input::get('id');
		$circleByZone = OfficeCircle::where('office_zone_id','=',$id)->lists('name','id');
		echo "<option></option>";
		foreach ($circleByZone as $id => $name) {
			echo "<option value='$id'>$name</option>";
		}
	}
}
