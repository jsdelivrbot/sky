<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('e_type_id'); // E-pin or E-Money
            $table->integer('transaction_id');
            $table->integer('wallet_type_id'); // transfer , shipping , etc
            $table->double('value');
            $table->integer('statement'); // credit(+) or debit (-)
            $table->double('e_pin_balance');
            $table->double('e_money_balance');
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
        Schema::dropIfExists('wallets');
    }
}
