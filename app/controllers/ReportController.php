<?php

class ReportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function tubewell()
	{
		$reports = Tubewell::lists('delivery_id','id');
		//$index = $reports->getPerPage() * ($reports->getCurrentPage()-1) + 1;
		return View::make('report.tubewell')->with(array(
												'reports' 	=> $reports,
												//'index'		=> $index
												));
	}


}
