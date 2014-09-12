<?php

class WeightsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /weights
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Weight::where('user_id', '=', Auth::user()->id)->get();

		return View::make('weights.index')->with(compact('entries'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /weights/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('weights.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /weights
	 *
	 * @return Response
	 */
	public function store()
	{
				// Validate input.
		$input = array(
			'weight' => Input::get('weight')
			);

		$rules = array(
			'weight' => array('required','numeric')
			);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::back()->withErrors($messages)->withInput();
		}

		// Store the input in an entry.
		$entry = new Weight();
		$entry->weight = Input::get('weight');
		$entry->user_id = Auth::user()->id;

		if($entry->save())
		{
			Session::flash('Success', 'Weight successfully saved.');
			return Redirect::route('weights.index');
		}
		else
		{
			return Redirect::back()->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /weights/{id}
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
	 * GET /weights/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$entry = Weight::find($id);

		return View::make('weights.edit')->with(compact('entry'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /weights/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Validate input.
		$input = array(
			'weight' => Input::get('weight')
			);

		$rules = array(
			'weight' => array('required','numeric')
			);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::back()->withErrors($messages)->withInput();
		}

		// Store the input in an entry.
		$entry = Weight::find($id);
		$entry->weight = Input::get('weight');

		if($entry->save())
		{
			Session::flash('Success', 'Weight successfully saved.');
			return Redirect::route('weights.index');
		}
		else
		{
			return Redirect::back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /weights/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$entry = Weight::find($id);

		$entry->delete();

		return Redirect::route('weights.index');
	}

}