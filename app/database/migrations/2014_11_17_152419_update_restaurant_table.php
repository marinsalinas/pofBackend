<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRestaurantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('restaurants', function(Blueprint $table)
		{
			$table->string('image_url');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('restaurants', function(Blueprint $table)
		{
			$table->dropColumn('image_url');
		});
	}

}
