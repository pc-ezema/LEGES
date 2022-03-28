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
            $table->id();
            $table->string('account_type');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('user_name')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('bar')->nullable();
            $table->string('location_practice')->nullable();
            $table->string('area_practice')->nullable();
            $table->string('documents')->nullable();
            $table->string('council_legal_education_certificate')->nullable();
            $table->string('call_bar_certificate')->nullable();
            $table->string('receipt_payment_practice_fee')->nullable();
            $table->string('cv')->nullable();
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
