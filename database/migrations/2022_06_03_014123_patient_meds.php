<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientMeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_meds', function (Blueprint $table) {
            $table->id();
            $table->foreignid('patient_medical_history_id')->references('id')->on('patient_medical_histories')->onDelete('cascade');
            $table->foreignid('med_id')->references('id')->on('meds')->onDelete('cascade');
            $table->integer('qty');
            $table->integer('price');
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
