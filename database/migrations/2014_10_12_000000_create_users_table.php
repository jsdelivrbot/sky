<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('unique_id')->unique();
            $table->string('phone');
            $table->string('parent_id');
            $table->integer('position');
            $table->string('name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('inside_password');
            $table->integer('state_id')->default(1);
            $table->string('city');
            $table->string('address');
            $table->string('national_id');
            $table->integer('birth_date');
            $table->string('beneficiary');
            $table->boolean('qualified')->default(0);
            $table->integer('user_status_id')->default(1);
            $table->double('e_pin_balance')->default(0);
            $table->double('e_money_balance')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
