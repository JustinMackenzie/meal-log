<?php

class Profile extends \Eloquent {
	protected $fillable = [];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function calculateBMR()
	{
		$result = 0;

		if($this->male)
		{
			$result = 88.362 + (13.397 * $this->weight) + (4.799 * $this->height) - (5.677 * $this->age);
		}
		else
		{
			$result = 447.593 + (9.247 * $this->weight) + (3.098 * $this->height) - (4.330 * $this->age);
		}

		return $result;
	}
}