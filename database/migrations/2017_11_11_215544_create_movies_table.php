<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('movie_id');
            $table->unsignedInteger('movie_category_id');
            $table->string('name');
            $table->unsignedInteger('duration');
            $table->string('directors');
            $table->string('stars');
            $table->string('img_name');
            $table->string('trailer_url');
            $table->text('storyline');
            $table->boolean('is_premiere');
        });

        Schema::table('movies', function($table) {
            $table->foreign('movie_category_id')->references('movie_category_id')->on('movie_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
