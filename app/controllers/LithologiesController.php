<?php

class LithologiesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lithologyAll = Lithologies::orderBy('tubewell_id','asc')->paginate();
		$index = $lithologyAll->getPerPage() * ($lithologyAll->getCurrentPage()-1) + 1;
		return View::make('lithology.index')->with(array(
						'lithologyAll' => $lithologyAll,
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
		$lithology = new Lithologies();
		$lithology->tubewell_id		= Input::get('tubewell_id');
		$lithology->depth_from		= Input::get('depth_from');
		$lithology->depth_to		= Input::get('depth_to');
		$lithology->soil_class		= Input::get('soil_class');
		$lithology->save();

		return Redirect::route('lithology.index');

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
		$lithologyById = Lithologies::find($id);
		$lithologyAll = Lithologies::orderBy('tubewell_id','asc')->paginate();
		$index = $lithologyAll->getPerPage() * ($lithologyAll->getCurrentPage()-1) + 1;
		return View::make('lithology.edit')->with(array(
						'lithologyAll' => $lithologyAll,
						'lithologyById' => $lithologyById,
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

		$lithology = Lithologies::find($id);
		$lithology->tubewell_id		= Input::get('tubewell_id');
		$lithology->depth_from		= Input::get('depth_from');
		$lithology->depth_to		= Input::get('depth_to');
		$lithology->soil_class		= Input::get('soil_class');
		$lithology->save();

		return Redirect::route('lithology.edit',array($id));

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Lithologies::destroy($id);
		return Redirect::route('lithology.index');
	}


}
