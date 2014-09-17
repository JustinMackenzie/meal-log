<?php

class EntriesController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => 'getLogin'));
	}

	/**
	 * Display a listing of the resource.
	 * GET /entries
	 *
	 * @return Response
	 */
	public function index()
	{

		$entries = Entry::where('created_at', '>=', date('Y-m-d'))
						->where('created_at', '<=', date('Y-m-d').' 23:59:59')
						->where('user_id', '=', Auth::user()->id)
						->get();

		$totalCalories = 0;
		$totalFats = 0;
		$totalCarbs = 0;
		$totalProteins = 0;

		foreach ($entries as $entry) 
		{
			$totalCalories += $entry->calories();
			$totalFats += $entry->fats();
			$totalCarbs += $entry->carbohydrates();
			$totalProteins += $entry->proteins();
		}

		$goalCalories = (int)Auth::user()->profile->calculateTDEE();

		$toGoCalories = $goalCalories - $totalCalories;

		return View::make('entries.index')->with(compact('entries'))
							->with(compact('totalCalories'))
							->with(compact('totalFats'))
							->with(compact('totalCarbs'))
							->with(compact('totalProteins'))
							->with(compact('goalCalories'))
							->with(compact('toGoCalories'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /entries/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$foods = Food::all()->lists('name', 'id');
		return View::make('entries.create')->with(compact('foods'));
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
			'servings' => Input::get('servings')
			);

		$rules = array(
			'food' => 'required',
			'servings' => array('required','numeric')
			);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::back()->withErrors($messages)->withInput();
		}

		// Store the input in an entry.
		$entry = new Entry();
		$entry->food_id = Input::get('food');
		$entry->user_id = Auth::user()->id;
		$entry->servings = Input::get('servings');

		if($entry->save())
		{
			return Redirect::route('entries.index');
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
		$entry = Entry::find($id);
		$foods = Food::all()->lists('name', 'id');
		return View::make('entries.edit')->with(compact('entry'))
								->with(compact('foods'));
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
		// Validate input.
		$input = array(
			'food' => Input::get('food'),
			'servings' => Input::get('servings')
			);

		$rules = array(
			'food' => 'required',
			'servings' => array('required','numeric')
			);

		$validator = Validator::make($input, $rules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::back()->withErrors($messages)->withInput();
		}

		// Store the input in an entry.
		$entry = Entry::find($id);
		$entry->food_id = Input::get('food');
		$entry->user_id = Auth::user()->id;
		$entry->servings = Input::get('servings');

		if($entry->save())
		{
			return Redirect::route('entries.index');
		}
		else
		{
			return Redirect::back()->withInput();
		}
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
		$entry = Entry::find($id);

		$entry->delete();

		return Redirect::route('entries.index');
	}

	public function archive($date)
	{
		$entries = Entry::where('created_at', '>=', $date)
						->where('created_at', '<=', $date.' 23:59:59')
						->where('user_id', '=', Auth::user()->id)
						->get();

		$totalCalories = 0;
		$totalFats = 0;
		$totalCarbs = 0;
		$totalProteins = 0;

		foreach ($entries as $entry) 
		{
			$totalCalories += $entry->calories;
			$totalFats += $entry->fats;
			$totalCarbs += $entry->carbohydrates;
			$totalProteins += $entry->proteins;
		}

		return View::make('entries.index')->with(compact('entries'))
							->with(compact('totalCalories'))
							->with(compact('totalFats'))
							->with(compact('totalCarbs'))
							->with(compact('totalProteins'));
	}

}