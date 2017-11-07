<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('type');
            $table->boolean('is_banned');
            $table->unsignedInteger('banned_by')->nullable();
        });

        Schema::table('customers', function($table) {
            $table->primary('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('type')->references('customer_type_id')->on('customer_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
