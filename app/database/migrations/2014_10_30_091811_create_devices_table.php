<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('devices', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('imei',25);
            $table->integer('restaurant_id')->unsigned();
            $table->string('name', 20);
            $table->string('phone', 20);
            $table->text('description');
            $table->enum('status', array('Activo', 'Inactivo'));
			$table->timestamps();

            $table->unique('imei');

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
		Schema::drop('devices');
	}

}
