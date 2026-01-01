<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations to initialize the transaction ledger.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('reference_id')->unique(); // Unique transaction hash
            $table->decimal('amount', 15, 2);         // Transaction amount
            $table->string('recipient_name');         // Creditor name
            $table->string('recipient_iban');         // Creditor IBAN
            $table->text('description')->nullable();  // Remittance information
            $table->integer('currency_id');           // Foreign key to currencies table
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
        Schema::dropIfExists('transactions');
    }
}
