<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRestarantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('restaurants', function(Blueprint $table)
		{
			$table->enum('icon_type',array('barbecue',
                'cafetaria',
                'fastfood',
                'fishchips',
                'gluten_free',
                'gourmet_star',
                'japanese-food',
                'kebab',
                'pizzaria',
                'restaurant_african',
                'restaurant_breakfast',
                'restaurant_buffet',
                'restaurant_chinese',
                'restaurant_fish',
                'restaurant_greek',
                'restaurant_indian',
                'restaurant_italian',
                'restaurant_korean',
                'restaurant_mediterranean',
                'restaurant_mexican',
                'restaurant',
                'restaurant_romantic',
                'restaurant_steakhouse',
                'restaurant_tapas',
                'restaurant_thai',
                'restaurant_turkish',
                'restaurant_vegetarian',
                'tajine_2',
                'terrace',
            ));
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
			$table->dropColumn('icon_type');
		});
	}

}
