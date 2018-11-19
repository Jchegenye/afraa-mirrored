<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // $table->integer('uid');
            $table->integer('session_id')->unsigned(); //$table->integer('session_id');
            $table->timestamps();

            $table->foreign('user_id')->references('uid')->on('users');
            $table->foreign('session_id')->references('id')->on('programme_sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programmes');
    }
}
