<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestarantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('restaurants', function(Blueprint $table){
            $table->engine = "InnoDB";



            $table->increments('id');
            $table->string('name', 50);
            $table->string('textaddress', 100);
            $table->boolean('onlycash');
            $table->string('type', 45);
            $table->text('description');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE restaurants ADD COLUMN location POINT");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('restaurants');
	}

}
