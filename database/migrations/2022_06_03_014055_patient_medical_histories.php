<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PatientMedicalHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_medical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignid('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->string('medical_record_number');
            $table->foreignid('nurse_in_charge_id')->references('id')->on('users');
            $table->foreignid('doctor_in_charge_id')->references('id')->on('users');
            $table->string('date');
            $table->string('time');
            $table->foreignid('location_id')->references('id')->on('locations');
            $table->string('anamnesis');
            $table->string('airway');
            $table->string('breathing');
            $table->string('pulse');
            $table->string('crt');
            $table->string('skin_color');
            $table->string('bleeding');
            $table->string('responce');
            $table->string('pupil');
            $table->string('reflect');
            $table->string('cgs_e');
            $table->string('cgs_v');
            $table->string('cgs_m');
            $table->string('td');
            $table->string('n');
            $table->string('r');
            $table->string('s');
            $table->string('sat_o2');
            $table->string('weight');
            $table->string('height');
            $table->string('pain');
            $table->string('pain_location');
            $table->string('head');
            $table->string('eyes');
            $table->string('tht');
            $table->string('neck');
            $table->string('chest');
            $table->string('abdomen');
            $table->string('back');
            $table->string('genital');
            $table->string('extremitas');
            $table->string('diagnose');
            $table->string('Comment');
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
