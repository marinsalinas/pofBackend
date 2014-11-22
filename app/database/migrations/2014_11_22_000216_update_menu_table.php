<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('menus', function(Blueprint $table)
		{
            $table->integer('food_id')->unsigned();
            /*$table->foreign('food_id')
                ->references('id')->on('foods')
                ->onDelete('cascade')
                ->onUpdate('cascade');*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('menus', function(Blueprint $table)
		{
            //$table->dropForeign('menus_food_id_foreign');
			$table->dropColumn('food_id');
		});
	}

}
