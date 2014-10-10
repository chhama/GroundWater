<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as'=>'home',function()
{
	return View::make('home.index');
}]);

Route::get('login','SessionsController@create');
Route::get('logout','SessionsController@destroy');

Route::resource('tubewell', 'TubewellController');
Route::resource('district', 'DistrictController');
Route::resource('block', 'BlockController');
Route::resource('panchayat', 'PanchayatController');
Route::resource('officezone', 'OfficeZoneController');
Route::resource('officecircle', 'OfficeCircleController');
Route::resource('officedivision', 'OfficeDivisionController');
Route::resource('officesubdivision', 'OfficeSubDivisionController');
Route::get('officesubdivision/{id}/division', array('uses'=>'OfficeSubDivisionController@division','as'=>'officesubdivision.division'));
Route::get('officesection/{id}/subDivision', array('uses'=>'OfficeSectionController@subDivision','as'=>'officesection.subDivision'));
Route::get('tubewell/{id}/block', array('uses'=>'TubewellController@block','as'=>'tubewell.block'));
Route::get('tubewell/{id}/panchayat', array('uses'=>'TubewellController@panchayat','as'=>'tubewell.panchayat'));
Route::get('tubewell/{id}/circle', array('uses'=>'TubewellController@circle','as'=>'tubewell.circle'));
Route::get('tubewell/{id}/division', array('uses'=>'TubewellController@division','as'=>'tubewell.division'));
Route::get('tubewell/{id}/subdivision', array('uses'=>'TubewellController@subdivision','as'=>'tubewell.subdivision'));
Route::get('tubewell/{id}/section', array('uses'=>'TubewellController@section','as'=>'tubewell.section'));
Route::get('tubewell/{id}/status', array('uses'=>'TubewellController@status','as'=>'tubewell.status'));
Route::get('report/tubewell', array('uses'=>'ReportController@tubewell','as'=>'report.tubewell'));
Route::get('report/filtertubewell', array('uses'=>'ReportController@filtertubewell','as'=>'report.filtertubewell'));
Route::resource('officesection', 'OfficeSectionController');
Route::resource('sessions', 'SessionsController');
Route::resource('user', 'UsersController');
Route::resource('lithology', 'LithologiesController');
Route::resource('waterquality','WaterQualityController');
