<?php

class PanchayatController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$districtAll = District::orderBy('name','asc')->lists('name','id');
		$panchayatAll = Panchayat::orderBy('name','asc')->paginate();
		return View::make('panchayat.index')->with(array(
						'districtAll' 	=> $districtAll,
						'panchayatAll'	=> $panchayatAll 
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
		$block = Block::find(Input::get('block_id')); 
		$panchayat = new Panchayat();
		$panchayat->name		= Input::get('name');
		$panchayat->code		= Input::get('code');
		$panchayat->district_id	= $block->district_id;
		$panchayat->block_id	= Input::get('block_id');
		$panchayat->save();

		return Redirect::route('panchayat.index');
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
		return View::make('panchayat.edit')->with(array(
						'districtAll' 	=> $districtAll,
						'panchayatAll' 	=> $panchayatAll,
						'panchayatById'	=> $panchayatById
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
		$block = Block::find(Input::get('block_id')); 
		$panchayat 				= Panchayat::find($id);
		$panchayat->name		= Input::get('name');
		$panchayat->code		= Input::get('code');
		$panchayat->district_id	= $block->district_id;
		$panchayat->block_id	= Input::get('block_id');
		$panchayat->save();

		return Redirect::route('panchayat.edit',$panchayat->id);
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
