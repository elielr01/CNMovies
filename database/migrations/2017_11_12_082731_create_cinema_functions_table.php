<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinemaFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_functions', function (Blueprint $table) {
            $table->increments('cinema_function_id');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('screen_id');
            $table->unsignedInteger('duration');
            $table->dateTime('starting_hour');
            $table->decimal('price');
            $table->boolean('is_active');
        });

        Schema::table('cinema_functions', function($table) {
            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->foreign('screen_id')->references('screen_id')->on('screens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema_functions');
    }
}
