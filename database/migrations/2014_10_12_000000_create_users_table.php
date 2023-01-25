<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login_id', 10);
            $table->string('name', 60);
            $table->string('email', 100)->unique();
            $table->string('mobile_no', 20);
            $table->string('country', 50);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('sponsor_id', 10);
            $table->string('position', 5);
            $table->string('user_role')->default('USER');
            $table->boolean('login_status')->default(1);
            $table->double('fund_wallet_amount')->default(0);
            $table->double('working_wallet_amount')->default(0);
            $table->double('roi_wallet_amount')->default(0);
            $table->string('wallet_address', 199)->nullable();
            $table->string('login_ip_address', 50)->nullable();
            $table->string('reg_ip_address', 50)->nullable();
            $table->timestamp('last_login_datetime')->nullable();
            $table->string('profile_path', 191)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
