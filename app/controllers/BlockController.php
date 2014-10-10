<?php

class BlockController extends \BaseController {


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
		$blockAll = Block::orderBy('name','asc')->paginate();
		$index = $blockAll->getPerPage() * ($blockAll->getCurrentPage()-1) + 1;
		return View::make('block.index')->with(array(
						'districtAll' => $districtAll,
						'blockAll' => $blockAll,
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
		$block = new Block();
		$block->name		= Input::get('name');
		$block->code		= Input::get('code');
		$block->district_id	= Input::get('district_id');
		$block->save();

		return Redirect::route('block.index');
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
		$blockAll = Block::orderBy('name','asc')->paginate();
		$blockById = Block::find($id);
		$index = $blockAll->getPerPage() * ($blockAll->getCurrentPage()-1) + 1;
		return View::make('block.edit')->with(array(
						'districtAll' => $districtAll,
						'blockAll' => $blockAll,
						'blockById' => $blockById,
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
		$block = Block::find($id);
		$block->name		= Input::get('name');
		$block->code		= Input::get('code');
		$block->district_id	= Input::get('district_id');
		$block->save();

		return Redirect::route('block.edit',$block->id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Block::destroy($id);
		return Redirect::route('block.index');
	}


}
