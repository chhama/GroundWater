<?php

class OfficeCircleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$officeZoneAll = OfficeZone::orderBy('name','asc')->lists('name','id');
		$officeCircleAll = officeCircle::orderBy('name','asc')->paginate();
		return View::make('officecircle.index')->with(array(
						'officeZoneAll' => $officeZoneAll,
						'officeCircleAll' => $officeCircleAll
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
		$officeCircle = new OfficeCircle();
		$officeCircle->name				= Input::get('name');
		$officeCircle->office_zone_id	= Input::get('office_zone_id');
		$officeCircle->save();

		return Redirect::route('officecircle.index');
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
		$officeCircleAll = OfficeCircle::orderBy('name','asc')->paginate();
		$officeCircleById = OfficeCircle::find($id);
		return View::make('officecircle.edit')->with(array(
						'officeZoneAll' => $officeZoneAll,
						'officeCircleAll' => $officeCircleAll,
						'officeCircleById' => $officeCircleById
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
		$officeCircle 				= OfficeCircle::find($id);
		$officeCircle->name	 		= Input::get('name');
		$officeCircle->office_zone_id	= Input::get('office_zone_id');
		$officeCircle->save();

		return Redirect::route('officecircle.edit',$officeCircle->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		OfficeCircle::destroy($id);
		return Redirect::route('officecircle.index');
	}


}
