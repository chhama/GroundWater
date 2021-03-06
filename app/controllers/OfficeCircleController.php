<?php

class OfficeCircleController extends \BaseController {

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
		$officeCircleAll = officeCircle::orderBy('name','asc')->paginate();
		$index = $officeCircleAll->getPerPage() * ($officeCircleAll->getCurrentPage()-1) + 1;
		return View::make('officecircle.index')->with(array(
						'officeZoneAll' => $officeZoneAll,
						'officeCircleAll' => $officeCircleAll,
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
		$officecircle = new OfficeCircle;
		$rules = array(
				'name' => 'required|unique:' . $officecircle->getTable() . ',name'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('officecircle.index')
				->withErrors($validator)
				->withInput(Input::all());
		}
		else {
			$officeCircle = new OfficeCircle();
			$officeCircle->name				= Input::get('name');
			$officeCircle->office_zone_id	= Input::get('office_zone_id');
			$officeCircle->save();

			return Redirect::route('officecircle.index');
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
		$officeCircleAll = OfficeCircle::orderBy('name','asc')->paginate();
		$officeCircleById = OfficeCircle::find($id);
		$index = $officeCircleAll->getPerPage() * ($officeCircleAll->getCurrentPage()-1) + 1;
		return View::make('officecircle.edit')->with(array(
						'officeZoneAll' => $officeZoneAll,
						'officeCircleAll' => $officeCircleAll,
						'officeCircleById' => $officeCircleById,
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
		$officecircle = new OfficeCircle;
		$rules = array(
				'name' => 'required|unique:' . $officecircle->getTable() . ',name,' . $id
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('officecircle.edit',$id)
				->withErrors($validator)
				->withInput(Input::all());
		}
		else {
			$officeCircle 				= OfficeCircle::find($id);
			$officeCircle->name	 		= Input::get('name');
			$officeCircle->office_zone_id	= Input::get('office_zone_id');
			$officeCircle->save();

			return Redirect::route('officecircle.edit',$officeCircle->id);
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
		OfficeCircle::destroy($id);
		return Redirect::route('officecircle.index');
	}


}
