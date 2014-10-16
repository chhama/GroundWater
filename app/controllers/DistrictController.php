<?php

class DistrictController extends \BaseController {


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
		$districtAll = District::orderBy('name','asc')->paginate();
		$index = $districtAll->getPerPage() * ($districtAll->getCurrentPage()-1) + 1;
		return View::make('district.index')->with(array(
						'districtAll' => $districtAll,
						'index'	=> $index
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
		$district = new District;
		$rules = array(
				'name' => 'required|unique:' . $district->getTable() . ',name',
				'code' => 'required|numeric|unique:' . $district->getTable() . ',code'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('district.index')
				->withErrors($validator)
				->withInput(Input::all());
		}
		else {
			$district = new District();
			$district->name	= Input::get('name');
			$district->code	= Input::get('code');
			$district->save();
			return Redirect::route('district.index');
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
		$districtById = District::find($id);
		$districtAll = District::orderBy('name','asc')->paginate();
		$index = $districtAll->getPerPage() * ($districtAll->getCurrentPage()-1) + 1;
		return View::make('district.edit')->with(array(
						'districtAll' => $districtAll,
						'districtById' => $districtById,
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
		$district = new District;
		$rules = array(
				'name' => 'required|unique:' . $district->getTable() . ',name,' . $id,
				'code' => 'required|numeric|unique:' . $district->getTable() . ',code,' . $id
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('district.edit',$id)
				->withErrors($validator)
				->withInput(Input::all());
		}
		else {
			$district = District::find($id);
			$district->name	= Input::get('name');
			$district->code	= Input::get('code');
			$district->save();
			return Redirect::route('district.edit',array($id));
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
		District::destroy($id);
		return Redirect::route('district.index');
	}



}
