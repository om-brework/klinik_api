<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedsPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meds_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignid('med_id')->references('id')->on('meds')->onDelete('cascade');
            $table->string('retail_price');
            $table->foreignid('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
