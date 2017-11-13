<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('ticket_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('cinema_function_id');
            $table->unsignedInteger('seat_id');
            $table->decimal('subtotal');
            $table->decimal('total');
            $table->timestamps();
        });

        Schema::table('tickets', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cinema_function_id')->references('cinema_function_id')->on('cinema_functions');
            $table->foreign('seat_id')->references('seat_id')->on('seats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
