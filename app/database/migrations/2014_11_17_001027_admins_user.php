<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminsUser extends Migration {

    public function up()
    {
        Schema::create('adminusers', function(Blueprint $table){
            $table->engine = "InnoDB";


            $table->increments('id');
            $table->string('email')->unique();
            $table->string('username', 20)->unique();
            $table->string('password');
            $table->string('fullname');
            $table->string('phone', 20);
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
            $table->string('api_token', 96);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('adminusers');
    }

}
