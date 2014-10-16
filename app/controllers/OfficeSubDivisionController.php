<?php

class OfficeSubDivisionController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$officeZoneAll = OfficeZone::orderBy('name','asc')->lists('name','id');
		$officeSubDivisionAll = OfficeSubDivision::orderBy('name','asc')->paginate();
		$index = $officeSubDivisionAll->getPerPage() * ($officeSubDivisionAll->getCurrentPage()-1) + 1;
		return View::make('officesubdivision.index')->with(array(
						'officeZoneAll' 	=> $officeZoneAll,
						'officeSubDivisionAll'	=> $officeSubDivisionAll,
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
		$officesubdivision = new OfficeSubDivision;
		$rules = array(
				'name' => 'required|unique:' . $officesubdivision->getTable() . ',name'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('officesubdivision.index')
				->withErrors($validator)
				->withInput(Input::all());
		}
		else {
			$officeDivision 		= OfficeDivision::find(Input::get('office_division_id'));

			$officeSubDivision 	= new OfficeSubDivision();
			$officeSubDivision->name				= Input::get('name');
			$officeSubDivision->office_zone_id		= $officeDivision->office_zone_id;
			$officeSubDivision->office_circle_id	= $officeDivision->office_circle_id;
			$officeSubDivision->office_division_id	= Input::get('office_division_id');
			$officeSubDivision->save();

			return Redirect::route('officesubdivision.index');
		}
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
		$officeSubDivisionAll = OfficeSubDivision::orderBy('name','asc')->paginate();
		$officeSubDivisionById = OfficeSubDivision::find($id);
		$index = $officeSubDivisionAll->getPerPage() * ($officeSubDivisionAll->getCurrentPage()-1) + 1;
		return View::make('officesubdivision.edit')->with(array(
						'officeZoneAll' 		=> $officeZoneAll,
						'officeSubDivisionAll'		=> $officeSubDivisionAll,
						'officeSubDivisionById'	=> $officeSubDivisionById,
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
		$officesubdivision = new OfficeSubDivision;
		$rules = array(
				'name' => 'required|unique:' . $officesubdivision->getTable() . ',name,' . $id
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('officesubdivision.edit',$id)
				->withErrors($validator)
				->withInput(Input::all());
		}
		else {
			$officeDivision 		= OfficeDivision::find(Input::get('office_division_id'));
			$officeSubDivision 		= OfficeSubDivision::find($id);
			$officeSubDivision->name				= Input::get('name');
			$officeSubDivision->office_zone_id		= $officeDivision->office_zone_id;
			$officeSubDivision->office_circle_id	= $officeDivision->office_circle_id;
			$officeSubDivision->office_division_id	= Input::get('office_division_id');
			$officeSubDivision->save();

			return Redirect::route('officesubdivision.edit', $officeSubDivision->id);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		OfficeSubDivision::destroy($id);
		return Redirect::route('officesubdivision.index');
	}

	public function division(){
		$id = Input::get('id');
		$divByCircle = OfficeDivision::where('office_circle_id','=',$id)->lists('name','id');
		foreach ($divByCircle as $id => $name) {
			echo "<option value='$id'>$name</option>";
		}
	}


}
