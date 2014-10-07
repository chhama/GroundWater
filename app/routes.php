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

Route::get('/', function()
{
	return View::make('home.index');
});

Route::resource('tubewell', 'TubewellController');
Route::resource('district', 'DistrictController');
Route::resource('block', 'BlockController');
Route::resource('panchayat', 'PanchayatController');
Route::resource('officezone', 'OfficeZoneController');
Route::resource('officecircle', 'OfficeCircleController');
Route::resource('officedivision', 'OfficeDivisionController');
Route::resource('officesubdivision', 'OfficeSubDivisionController');
Route::resource('officesection', 'OfficeSectionController');
