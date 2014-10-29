<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('restaurant_id')->unsigned();
            $table->string('product', 45);
            $table->double('price');
            $table->text('description');
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('restaurant_id')
                ->references('id')->on('restaurants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations
     *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menus');
	}

}
