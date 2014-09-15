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

	public function calculateTDEE()
	{
		$result = $this->calculateBMR();

		switch($this->activity)
		{
			case 0:
				$result *= 1.2;
				break;

			case 1:
				$result *= 1.375;
				break;

			case 2:
				$result *= 1.55;
				break;

			case 3:
				$result *= 1.725;
				break;

			case 4:
				$result *= 1.9;
				break;
		}

		return $result;
	}
}