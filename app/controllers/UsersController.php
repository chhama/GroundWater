<?php

class UsersController extends \BaseController {

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
		$userAll = User::orderby('name')->paginate();
		$index = $userAll->getPerPage() * ($userAll->getCurrentPage()-1) + 1;
		return View::make('user.index',array(
										'userAll'=>$userAll,
										'index'=>$index
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
		$user = new User();
		$credentials = array(
				'username' 		=> 'required|unique:'.$user->getTable().',username',
				'password'		=> 'required'
				);
		$validator	= Validator::make(Input::all(),$credentials);
		if($validator->fails()){
			return Redirect::to('user')
								->withErrors($validator)
								->withInput(Input::all())
								->with(['flash_message'=>'Username should be unique','msgtype'=>'danger']);
		} else {
			$user = new User();
			$user->name = Input::get('name');
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('username'));
			$user->remember_token = Input::get('_token');
			$user->usertype = Input::get('usertype');
			if($user->save())
				return Redirect::back()->with(['flash_message'=>'User successfully created','msgtype'=>'success']);
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
		$userById = User::find($id);
		return View::make('user.show',array(
										'userById'=>$userById
										));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$userById = User::find($id);
		$userAll = User::orderby('name')->paginate();
		$index = $userAll->getPerPage() * ($userAll->getCurrentPage()-1) + 1;
		return View::make('user.edit',array(
										'userAll'=>$userAll,
										'index'=>$index,
										'userById'=>$userById
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
		$user = new User();
		$credentials = array(
				'username' 		=> 'required|unique:'.$user->getTable().',username,'.$id,
				);
		$validator	= Validator::make(Input::all(),$credentials);
		if($validator->fails()){
			return Redirect::to('user')
								->withErrors($validator)
								->withInput(Input::all())
								->with(['flash_message'=>'Username should be unique','msgtype'=>'danger']);
		} else {
			$user = User::find($id);
			$user->name 			= Input::get('name');
			$user->username 		= Input::get('username');
			if(strlen(Input::get('password')) > 0)
				$user->password 	= Hash::make(Input::get('password'));
			$user->usertype 		= Input::get('usertype');
			if($user->save())

			return Redirect::back()->with(['flash_message'=>'User successfully created','msgtype'=>'success']);
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
		User::destroy($id);
		return Redirect::route('user.index')->with(['flash_message'=>'User successfully Deleted','msgtype'=>'success']);
	}


}
