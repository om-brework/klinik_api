<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServicePrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignid('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('price');
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
