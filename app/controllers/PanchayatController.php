<?php

class PanchayatController extends \BaseController {

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
		$districtAll = District::orderBy('name','asc')->lists('name','id');
		$panchayatAll = Panchayat::orderBy('name','asc')->paginate();
		$index = $panchayatAll->getPerPage() * ($panchayatAll->getCurrentPage()-1) + 1;

		return View::make('panchayat.index')->with(array(
						'districtAll' 	=> $districtAll,
						'panchayatAll'	=> $panchayatAll,
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
		$panchayat = new Panchayat;
		$rules = array(
				'name' => 'required',
				'code' => 'required|numeric|unique:' . $panchayat->getTable() . ',code'
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('panchayat.index')
				->withErrors($validator)
				->withInput(Input::all());
		}
		else {
			$block = Block::find(Input::get('block_id')); 
			$panchayat = new Panchayat();
			$panchayat->name		= Input::get('name');
			$panchayat->code		= Input::get('code');
			$panchayat->district_id	= $block->district_id;
			$panchayat->block_id	= Input::get('block_id');
			$panchayat->save();

			return Redirect::route('panchayat.index');
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
		$districtAll = District::orderBy('name','asc')->lists('name','id');
		$panchayatAll = Panchayat::orderBy('name','asc')->paginate();
		$panchayatById = Panchayat::find($id);
		$index = $panchayatAll->getPerPage() * ($panchayatAll->getCurrentPage()-1) + 1;

		return View::make('panchayat.edit')->with(array(
						'districtAll' 	=> $districtAll,
						'panchayatAll' 	=> $panchayatAll,
						'panchayatById'	=> $panchayatById,
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
		$panchayat = new Panchayat;
		$rules = array(
				'name' => 'required',
				'code' => 'required|numeric|unique:' . $panchayat->getTable() . ',code,' . $id
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('panchayat.edit',$id)
				->withErrors($validator)
				->withInput(Input::all());
		}
		else {
			$block = Block::find(Input::get('block_id')); 
			$panchayat 				= Panchayat::find($id);
			$panchayat->name		= Input::get('name');
			$panchayat->code		= Input::get('code');
			$panchayat->district_id	= $block->district_id;
			$panchayat->block_id	= Input::get('block_id');
			$panchayat->save();

			return Redirect::route('panchayat.edit',$panchayat->id);
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
		Panchayat::destroy($id);
		return Redirect::route('panchayat.index');
	}


}
