<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddFoodForeignKeyToEntries extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('entries', function(Blueprint $table)
		{
			$table->dropColumn('food');
			$table->integer('food_id')->unsigned();
			$table->foreign('food_id')->references('id')->on('foods');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('entries', function(Blueprint $table)
		{
			$table->dropForeign('entries_food_id_foreign');
			$table->dropColumn('food_id');
			$table->string('food');
		});
	}

}
