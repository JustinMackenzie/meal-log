<?php

class FoodsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /foods
	 *
	 * @return Response
	 */
	public function index()
	{
		$foods = Food::all();
		return View::make('foods.index')->with(compact('foods'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /foods/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('foods.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /foods
	 *
	 * @return Response
	 */
	public function store()
	{
				// Validate input.
		$input = array(
			'name' => Input::get('name'),
			'serving' => Input::get('serving'),
			'calories' => Input::get('calories'),
			'fats' => Input::get('fats'),
			'carbohydrates' => Input::get('carbohydrates'),
			'proteins' => Input::get('proteins')
			);

		$rules = array(
			'name' => 'required',
			'serving' => array('required', 'numeric'),
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
		$food = new Food();
		$food->name = Input::get('name');
		$food->serving_size = Input::get('serving');
		$food->fats = Input::get('fats');
		$food->carbohydrates = Input::get('carbohydrates');
		$food->proteins = Input::get('proteins');
		$food->calories = Input::get('calories');

		if($food->save())
		{
			return Redirect::route('foods.index');
		}
		else
		{
			return Redirect::back()->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /foods/{id}
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
	 * GET /foods/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$food = Food::find($id);
		return View::make('foods.edit')->with(compact('food'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /foods/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
				// Validate input.
		$input = array(
			'name' => Input::get('name'),
			'serving' => Input::get('serving'),
			'calories' => Input::get('calories'),
			'fats' => Input::get('fats'),
			'carbohydrates' => Input::get('carbohydrates'),
			'proteins' => Input::get('proteins')
			);

		$rules = array(
			'name' => 'required',
			'serving' => array('required', 'numeric'),
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
		$food = Food::find($id);
		$food->name = Input::get('name');
		$food->serving_size = Input::get('serving');
		$food->fats = Input::get('fats');
		$food->carbohydrates = Input::get('carbohydrates');
		$food->proteins = Input::get('proteins');
		$food->calories = Input::get('calories');

		if($food->save())
		{
			return Redirect::route('foods.index');
		}
		else
		{
			return Redirect::back()->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /foods/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$food = Food::find($id);
		$food->delete();
		return Redirect::route('foods.index');
	}

}