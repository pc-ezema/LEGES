<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cases', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('case_id');
            $table->string('type_of_case');
            $table->string('amount');
            $table->string('leges_commission')->nullable();
            $table->string('amount_payout')->nullable();
            $table->text('description');
            $table->string('lawyer_id')->nullable();
            $table->string('status')->default('Pending');
            $table->string('payment')->default(false);
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
        Schema::dropIfExists('user_cases');
    }
}
