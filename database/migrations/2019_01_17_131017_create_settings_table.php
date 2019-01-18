<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('theme_type');
            $table->string('title_login')->nullable();
            $table->text('desc_login')->nullable();
            $table->string('bg_photo_login')->nullable();
            $table->string('photo_login')->nullable();
            $table->string('photo_asc')->nullable();
            $table->string('photo_aga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
