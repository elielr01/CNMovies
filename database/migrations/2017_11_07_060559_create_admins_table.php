<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->unsignedInteger('admin_id');
            $table->unsignedInteger('added_by');
        });

        Schema::table('admins', function($table) {
            $table->primary('admin_id');
            $table->foreign('admin_id')->references('id')->on('users');
            $table->foreign('added_by')->references('admin_id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
