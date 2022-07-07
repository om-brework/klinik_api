<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedsStocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meds_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignid('med_id')->references('id')->on('meds')->onDelete('cascade');
            $table->foreignid('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->string('qty');
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
