<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpendaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opendays', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('restaurant_id')->unsigned();
            $table->enum('day', array('MON', 'TUE', "WED", "THU", "FRY", "SAT", "SUN"));
            $table->time('open');
            $table->time('close');

            $table->foreign('restaurant_id')
                ->references('id')->on('restaurants')
                ->onDelete('cascade')
                ->onUpdate('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('opendays');
	}

}
