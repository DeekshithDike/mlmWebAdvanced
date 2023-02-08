<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activation_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('users_id');
            $table->string('login_id', 10);
            $table->integer('packages_id');
            $table->double('activation_amount');
            $table->timestamp('activated_on')->nullable();
            $table->timestamp('declined_on')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('packages_name', 100);
            $table->double('packages_min_amount');
            $table->double('packages_max_amount');
            $table->double('packages_roi');
            $table->double('packages_referral');
            $table->double('packages_binary');
            $table->double('packages_capping');
            $table->integer('packages_duration');
            $table->string('activation_status', 15)->default('ACTIVATED');  //ACTIVATED, EXPIRED
            $table->string('activation_by', 15)->default('USER');
            $table->bigInteger('created_by');
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
        Schema::dropIfExists('activation_histories');
    }
}
