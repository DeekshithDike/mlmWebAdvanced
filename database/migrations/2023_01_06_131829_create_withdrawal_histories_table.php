<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('users_id');
            $table->double('withdrawal_amount');
            $table->double('deduction')->nullable();
            $table->string('withdraw_from', 25)->nullable();    // WORKING_WALLET, ROI_WALLET
            $table->string('transaction_reference', 191)->nullable();
            $table->string('withdrawal_status', 15)->default("PENDING");    // PENDING, DECLINED, CONFIRMED
            $table->string('remarks', 191)->nullable();
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
        Schema::dropIfExists('withdrawal_histories');
    }
}
