<?php

class OfficeDivisionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$officeZoneAll = OfficeZone::orderBy('name','asc')->lists('name','id');
		$officeDivisionAll = OfficeDivision::orderBy('name','asc')->paginate();
		$index = $officeDivisionAll->getPerPage() * ($officeDivisionAll->getCurrentPage()-1) + 1;
		return View::make('officedivision.index')->with(array(
						'officeZoneAll' 	=> $officeZoneAll,
						'officeDivisionAll'	=> $officeDivisionAll,
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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$officeCircle 		= OfficeCircle::find(Input::get('office_circle_id')); 
		$officeDivision 	= new OfficeDivision();
		$officeDivision->name				= Input::get('name');
		$officeDivision->office_zone_id		= $officeCircle->office_zone_id;
		$officeDivision->office_circle_id	= Input::get('office_circle_id');
		$officeDivision->save();

		return Redirect::route('officedivision.index');
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
		$officeZoneAll = OfficeZone::orderBy('name','asc')->lists('name','id');
		$officeDivisionAll = OfficeDivision::orderBy('name','asc')->paginate();
		$officeDivisionById = OfficeDivision::find($id);
		$index = $officeDivisionAll->getPerPage() * ($officeDivisionAll->getCurrentPage()-1) + 1;
		return View::make('officedivision.edit')->with(array(
						'officeZoneAll' 		=> $officeZoneAll,
						'officeDivisionAll'		=> $officeDivisionAll,
						'officeDivisionById'	=> $officeDivisionById,
						'index' => $index
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
		$officeCircle 		= OfficeCircle::find(Input::get('block_id')); 
		$officeDivision 	= OfficeDivision::find($id);
		$officeDivision->name				= Input::get('name');
		$officeDivision->office_zone_id		= $officeCircle->office_zone_id;
		$officeDivision->office_circle_id	= Input::get('office_circle_id');
		$officeDivision->save();

		return Redirect::route('officedivision.edit', $officedivision->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		OfficeDivision::destroy($id);
		return Redirect::route('officedivision.index');
	}


}
