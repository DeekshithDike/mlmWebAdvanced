<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinbaseChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coinbase_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('users_id')->nullable();
            $table->string('payment_for', 50); // ADD_FUND
            $table->string('charges_id', 100);
            $table->string('charges_code', 100);
            $table->string('latest_status', 50)->default('NEW');    // check https://commerce.coinbase.com/docs/#quickstart payment status section
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
        Schema::dropIfExists('coinbase_charges');
    }
}
