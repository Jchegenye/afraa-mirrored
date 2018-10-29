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
            $table->string('title');
            $table->string('description');
            $table->string('venue');
            $table->integer('speaker_id');  //$table->integer('speaker_id')->unsigned();
            $table->integer('moderator_id');   //$table->integer('moderator_id')->unsigned();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->dateTime('date');
            $table->timestamps();

            // $table->foreign('speaker_id')->references('id')->on('users');
            // $table->foreign('moderator_id')->references('id')->on('users');
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
