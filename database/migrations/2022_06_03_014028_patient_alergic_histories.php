<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientAlergicHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_allergic_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignid('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->string('allergic');
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
