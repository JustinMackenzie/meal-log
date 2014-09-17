<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropColumnsFromEntries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entries', function(Blueprint $table)
		{
			$table->dropColumn('calories');
			$table->dropColumn('fats');
			$table->dropColumn('carbohydrates');
			$table->dropColumn('proteins');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('entries', function(Blueprint $table)
		{
			$table->decimal('calories');
			$table->decimal('fats');
			$table->decimal('carbohydrates');
			$table->decimal('proteins');
		});
	}

}
