<?php

class ReportController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tubewell()
	{
		// $reports = Tubewell::count();
		// $name = "No of Tubewell";
		// //$index = $reports->getPerPage() * ($reports->getCurrentPage()-1) + 1;
		// return View::make('report.tubewell')->with(array(
		// 										'reports' 	=> $reports,
		// 										'name'		=> $name
		// 										//'index'		=> $index
		// 										));
		$reports = Tubewell::count();
		return View::make('report.tubewell')->with(array(
										'name'=>'No of Tubewell',
										'value'=>$reports
									));
		
	}

	public function filtertubewell() {
		$reports = Tubewell::select(DB::raw('count(*) as countRow, delivery_id'))->groupBy('delivery_id')->get();
		return View::make('report.filtertubewell')->with(array(
										'reports'	=> $reports
										));
	}


}
