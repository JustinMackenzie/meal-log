<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validate input.
		$input = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'password_confirmation' => Input::get('confirmation')
			);

		$rules = array(
			'email' => array('required', 'email'),
			'password' => array('required', 'min:8' , 'confirmed'),
			'password_confirmation' => array('required','min:8')
			);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::back()->withErrors($messages)->withInput();
		}

		$user = new User();
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		if($user->save())
		{
			return Redirect::route('entries.index');
		}
		else
		{
			return Redirect::back();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function login()
	{
		return View::make('users.login');
	}

	public function signIn()
	{
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) 
		{
    		return Redirect::route('entries.index');
		} 
		else 
		{
    		return Redirect::to('login')
        		->with('message', 'Your username/password combination was incorrect')
        		->withInput();
		}
	}

}