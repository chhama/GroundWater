<?php

class OfficeZoneController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$officeZoneAll = OfficeZone::orderBy('name','asc')->paginate();
		return View::make('officezone.index')->with(array(
						'officeZoneAll' => $officeZoneAll
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
		$officeZone = new OfficeZone();
		$officeZone->name	= Input::get('name');
		$officeZone->save();

		return Redirect::route('officezone.index');

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
		$officeZoneById = OfficeZone::find($id);
		$officeZoneAll = OfficeZone::orderBy('name','asc')->paginate();
		return View::make('officezone.edit')->with(array(
						'officeZoneAll' => $officeZoneAll,
						'officeZoneById' => $officeZoneById
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

		$officeZone = OfficeZone::find($id);
		$officeZone->name	= Input::get('name');
		$officeZone->save();

		return Redirect::route('officezone.edit',array($id));

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		OfficeZone::destroy($id);
		return Redirect::route('officezone.index');
	}


}
