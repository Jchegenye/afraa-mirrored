<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammeSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_sessions', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('venue');
            $table->string('featured_image');
            $table->integer('speaker_id')->unsigned(); //$table->integer('speaker_id');  //
            $table->integer('moderator_id')->unsigned(); //$table->integer('moderator_id');   //
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->dateTime('date');
            $table->timestamps();

            $table->foreign('speaker_id')->references('uid')->on('users');
            $table->foreign('moderator_id')->references('uid')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programme_sessions');
    }
}
