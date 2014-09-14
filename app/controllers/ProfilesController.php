<?php

class ProfilesController extends \BaseController {

	/**
	 * Display a listing of the profile.
	 * GET /profiles
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new profile.
	 * GET /profiles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$genders = array(1 =>'Male', 0 => 'Female');
		return View::make('profiles.create')->with(compact('genders'));
	}

	/**
	 * Store a newly created profile in storage.
	 * POST /profiles
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validate input.
		$input = array(
			'age' => Input::get('age'),
			'height' => Input::get('height'),
			'weight' => Input::get('weight')
			);

		$rules = array(
			'age' => array('required', 'integer'),
			'height' => 'required',
			'weight' => 'required'
			);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::back()->withErrors($messages)->withInput();
		}

		$height = Input::get('height');
		$weight = Input::get('weight');

		if(Input::get('heightUnit') == 'in')
		{
			// Convert to cm
			$height = $height / 0.39370;
		}

		if(Input::get('weightUnit') == 'lb')
		{
			// Convert to kg
			$weight = $weight / 2.2046;
		}

		$profile = new Profile();
		$profile->user_id = Auth::user()->id;
		$profile->male = Input::get('gender');
		$profile->age = Input::get('age');
		$profile->height = $height;
		$profile->weight = $weight;

		if($profile->save())
		{
			return Redirect::route('entries.index', $profile->id);
		}
		else
		{
			return Redirect::back()->withInput();
		}
	}

	/**
	 * Display the specified profile.
	 * GET /profiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified profile.
	 * GET /profiles/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$profile = Profile::find($id);
		$genders = array(1 =>'Male', 0 => 'Female');
		return View::make('profiles.edit')->with(compact('profile'))
										  ->with(compact('genders'));
	}

	/**
	 * Update the specified profile in storage.
	 * PUT /profiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Validate input.
		$input = array(
			'age' => Input::get('age'),
			'height' => Input::get('height'),
			'weight' => Input::get('weight')
			);

		$rules = array(
			'age' => array('required', 'integer'),
			'height' => 'required',
			'weight' => 'required'
			);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::back()->withErrors($messages)->withInput();
		}

		$height = Input::get('height');
		$weight = Input::get('weight');

		if(Input::get('heightUnit') == 'in')
		{
			// Convert to cm
			$height = $height / 0.39370;
		}

		if(Input::get('weightUnit') == 'lb')
		{
			// Convert to kg
			$weight = $weight / 2.2046;
		}

		$profile = Profile::find($id);
		$profile->user_id = Auth::user()->id;
		$profile->male = Input::get('gender');
		$profile->age = Input::get('age');
		$profile->height = $height;
		$profile->weight = $weight;

		if($profile->save())
		{
			return Redirect::route('entries.index', $profile->id);
		}
		else
		{
			return Redirect::back()->withInput();
		}
	}

	/**
	 * Remove the specified profile from storage.
	 * DELETE /profiles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}