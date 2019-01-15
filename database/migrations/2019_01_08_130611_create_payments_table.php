<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('requestID');
            $table->string('decision');
            $table->string('currency');
            $table->string('amount');
            $table->string('authorizationCode');
            $table->string('authorizedDateTime');
            $table->string('reconciliationID');
            $table->string('paymentNetworkTransactionID');
            $table->string('receiptNumber');

            $table->foreign('user_id')->references('uid')->on('users');
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
        Schema::dropIfExists('payments');
    }
}
