<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('uid')->on('users');
            $table->string('Company_Name')->nullable();
            $table->string('your_title')->nullable();
            $table->string('Job_Title')->nullable();
            $table->string('Member_Airline')->nullable();
            $table->string('AFRAA_Partner')->nullable();
            $table->string('other')->nullable();
            $table->string('Passport_Number')->nullable();
            $table->string('Business_Address')->nullable();
            $table->string('Fax')->nullable();
            $table->string('documentation_language')->nullable();
            $table->string('Spouse_Name')->nullable();
            $table->string('Spouse_Nationality')->nullable();
            $table->string('Spouse_Passport_Number')->nullable();
            $table->string('ArrivalDate')->nullable();
            $table->string('FlightNumber')->nullable();
            $table->string('ArrivalTime')->nullable();
            $table->string('DepartureDate')->nullable();
            $table->string('DepartureFlightNumber')->nullable();
            $table->string('DepartureTime')->nullable();
            $table->string('Social_Functions')->nullable();

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
        Schema::dropIfExists('profiles');
    }
}
