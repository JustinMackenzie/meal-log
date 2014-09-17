<?php

class Entry extends \Eloquent {
	protected $fillable = [];

	public function food()
	{
		return $this->belongsTo('Food');
	}

	public function calories()
	{
		return $this->servings * $this->food->calories;
	}

	public function fats()
	{
		return $this->servings * $this->food->fats;
	}

	public function carbohydrates()
	{
		return $this->servings * $this->food->carbohydrates;
	}

	public function proteins()
	{
		return $this->servings * $this->food->proteins;
	}
}