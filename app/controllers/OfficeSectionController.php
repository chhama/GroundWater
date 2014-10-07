<?php

class OfficeSectionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$officeZoneAll = OfficeZone::orderBy('name','asc')->lists('name','id');
		$officeDivisionAll = OfficeDivision::orderBy('name','asc')->lists('name','id');
		$officeSectionAll = OfficeSection::orderBy('name','asc')->paginate();
		return View::make('officesection.index')->with(array(
						'officeZoneAll' 	=> $officeZoneAll,
						'officeDivisionAll'	=> $officeDivisionAll,
						'officeSectionAll'	=> $officeSectionAll 
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
		$officeSubDivision 		= OfficeSubDivision::find(Input::get('office_sub_division_id')); 
		$officeSection 			= new OfficeSection();
		$officeSection->name				= Input::get('name');
		$officeSection->office_zone_id		= $officeSubDivision->office_zone_id;
		$officeSection->office_circle_id	= $officeSubDivision->office_circle_id;
		$officeSection->office_division_id	= $officeSubDivision->office_division_id;
		$officeSection->office_sub_division_id	= Input::get('office_sub_division_id');
		$officeSection->save();

		return Redirect::route('officesection.index');
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
		$officeDivisionAll = OfficeDivision::orderBy('name','asc')->lists('name','id');
		$officeSectionAll = OfficeSection::orderBy('name','asc')->paginate();
		$officeSectionById = OfficeSection::find($id);

		return View::make('officesection.edit')->with(array(
						'officeZoneAll' 		=> $officeZoneAll,
						'officeDivisionAll'		=> $officeDivisionAll,
						'officeSectionAll'		=> $officeSectionAll,
						'officeSectionById'		=> $officeSectionById 
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
		$officeSubDivision 		= OfficeSubDivision::find(Input::get('office_sub_division_id')); 
		$officeSection 			= OfficeSection::find($id);
		$officeSection->name				= Input::get('name');
		$officeSection->office_zone_id		= $officeSubDivision->office_zone_id;
		$officeSection->office_circle_id	= $officeSubDivision->office_circle_id;
		$officeSection->office_division_id	= $officeSubDivision->office_division_id;
		$officeSection->office_sub_division_id	= Input::get('office_sub_division_id');
		$officeSection->save();

		return Redirect::route('officesection.edit', $officeSection->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		OfficeSection::destroy($id);
		return Redirect::route('officesection.index');
	}


}
