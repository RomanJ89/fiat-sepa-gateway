<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations to create currency support.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function(Blueprint $table) {
            $table->increments('id');
            $table->string('code', 3); // e.g., EUR, USD, GBP
            $table->string('name');    // e.g., Euro, US Dollar
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
        Schema::dropIfExists('currencies');
    }
}
