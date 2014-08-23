<?php

class EntriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /entries
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('entries.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /entries/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('entries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /entries
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validate input.
		$input = array(
			'food' => Input::get('food'),
			'calories' => Input::get('calories'),
			'fats' => Input::get('fats'),
			'carbohydrates' => Input::get('carbohydrates'),
			'proteins' => Input::get('proteins')
			);

		$rules = array(
			'food' => 'required',
			'calories' => array('required','numeric'),
			'fats' => array('required','numeric'),
			'carbohydrates' => array('required','numeric'),
			'proteins' => array('required','numeric')
			);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::back()->withErrors($messages)->withInput();
		}

		// Store the input in an entry.
		$entry = new Entry();
		$entry->food = Input::get('food');
		$entry->fats = Input::get('fats');
		$entry->carbohydrates = Input::get('carbohydrates');
		$entry->proteins = Input::get('proteins');
		$entry->calories = Input::get('calories');

		if($entry->save())
		{
			return Redirect::route('entries.index', $entry->id);
		}
		else
		{
			return Redirect::back()->withInput();
		}

	}

	/**
	 * Display the specified resource.
	 * GET /entries/{id}
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
	 * GET /entries/{id}/edit
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
	 * PUT /entries/{id}
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
	 * DELETE /entries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}