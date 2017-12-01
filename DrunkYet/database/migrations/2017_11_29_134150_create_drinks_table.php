<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->increments('id');
            // ->unique() sur name ?
            $table->string('name');
            $table->float('default_degree');
            $table->integer('default_quantity');
            $table->timestamps();
        });

        Schema::create('drink_user', function (Blueprint $table) {
            $table->integer('drink_id');
            $table->integer('user_id');
            $table->float('degree')->nullable();
            $table->integer('quantity')->nullable();
            $table->dateTime('drinking_time');
            $table->primary(['drink_id','user_id','drinking_time']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
        Schema::dropIfExists('drink_user');
    }
}
