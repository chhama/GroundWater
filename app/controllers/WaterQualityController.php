<?php

class WaterQualityController extends \BaseController {

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
		$waterQualityAll = WaterQuality::orderBy('tubewell_id','asc')->paginate();
		$index = $waterQualityAll->getPerPage() * ($waterQualityAll->getCurrentPage()-1) + 1;
		return View::make('waterquality.index')->with(array(
						'waterQualityAll' => $waterQualityAll,
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
		return View::make('waterquality.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$quality=new WaterQuality;
		$quality->tubewell_id = Input::get('tubewell_id');
		$quality->ph = Input::get('ph'); 
		$quality->colour = Input::get('colour');
		$quality->odour = Input::get('odour');
		$quality->taste = Input::get('taste');
		$quality->turbidity = Input::get('turbidity');
		$quality->caco3 = Input::get('caco3');
		$quality->ammonia = Input::get('ammonia');
		$quality->iron = Input::get('iron');
		$quality->chlorides = Input::get('chlorides');
		$quality->free_residual = Input::get('free_residual');
		$quality->dissolved_solid = Input::get('dissolved_solid');
		$quality->calcium = Input::get('calcium');
		$quality->magnesium = Input::get('magnesium');
		$quality->copper = Input::get('copper');
		$quality->manganese = Input::get('manganese');
		$quality->sulphate = Input::get('sulphate');
		$quality->nitrates = Input::get('nitrates');
		$quality->fluoride = Input::get('fluoride');
		$quality->phenolic = Input::get('phenolic');
		$quality->mercury = Input::get('mercury');
		$quality->cadmium = Input::get('cadmium');
		$quality->selenium = Input::get('selenium');
		$quality->arsenic = Input::get('arsenic');
		$quality->cyanide = Input::get('cyanide');
		$quality->lead = Input::get('lead');
		$quality->zinc = Input::get('zinc');
		$quality->anionic = Input::get('anionic');
		$quality->chromium = Input::get('chromium');
		$quality->polynuclear = Input::get('polynuclear');
		$quality->mineral_oil = Input::get('mineral_oil');
		$quality->pesticides = Input::get('pesticides');
		$quality->radioactive = Input::get('radioactive');
		$quality->alkalinity = Input::get('alkalinity');
		$quality->aluminium = Input::get('aluminium');
		$quality->nickel = Input::get('nickel');
		$quality->boron = Input::get('boron');
		$quality->ecoli = Input::get('ecoli');
		$quality->tested_by = Input::get('tested_by');
		$quality->test_date = Input::get('test_date');


		if($quality->save())
			return Redirect::route('waterquality.index')->with(['flash_message'=>'Record added successfully','msgtype'=>'success']);
		else
			return Redirect::back()->with('flash_message','Unable to create record')->withInput();
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
		$waterqualityById = WaterQuality::find($id);
		return View::make('waterquality.edit')->with(array(
						'waterqualityById' => $waterqualityById
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
		$quality = WaterQuality::find($id);
		$quality->tubewell_id = Input::get('tubewell_id');
		$quality->ph = Input::get('ph'); 
		$quality->colour = Input::get('colour');
		$quality->odour = Input::get('odour');
		$quality->taste = Input::get('taste');
		$quality->turbidity = Input::get('turbidity');
		$quality->caco3 = Input::get('caco3');
		$quality->ammonia = Input::get('ammonia');
		$quality->iron = Input::get('iron');
		$quality->chlorides = Input::get('chlorides');
		$quality->free_residual = Input::get('free_residual');
		$quality->dissolved_solid = Input::get('dissolved_solid');
		$quality->calcium = Input::get('calcium');
		$quality->magnesium = Input::get('magnesium');
		$quality->copper = Input::get('copper');
		$quality->manganese = Input::get('manganese');
		$quality->sulphate = Input::get('sulphate');
		$quality->nitrates = Input::get('nitrates');
		$quality->fluoride = Input::get('fluoride');
		$quality->phenolic = Input::get('phenolic');
		$quality->mercury = Input::get('mercury');
		$quality->cadmium = Input::get('cadmium');
		$quality->selenium = Input::get('selenium');
		$quality->arsenic = Input::get('arsenic');
		$quality->cyanide = Input::get('cyanide');
		$quality->lead = Input::get('lead');
		$quality->zinc = Input::get('zinc');
		$quality->anionic = Input::get('anionic');
		$quality->chromium = Input::get('chromium');
		$quality->polynuclear = Input::get('polynuclear');
		$quality->mineral_oil = Input::get('mineral_oil');
		$quality->pesticides = Input::get('pesticides');
		$quality->radioactive = Input::get('radioactive');
		$quality->alkalinity = Input::get('alkalinity');
		$quality->aluminium = Input::get('aluminium');
		$quality->nickel = Input::get('nickel');
		$quality->boron = Input::get('boron');
		$quality->ecoli = Input::get('ecoli');
		$quality->tested_by = Input::get('tested_by');
		$quality->test_date = Input::get('test_date');


		if($quality->save())
			return Redirect::route('waterquality.index')->with(['flash_message'=>'Record added successfully','msgtype'=>'success']);
		else
			return Redirect::back()->with('flash_message','Unable to create record')->withInput();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		WaterQuality::destroy($id);
		return Redirect::route('waterquality.index');
	}


}
