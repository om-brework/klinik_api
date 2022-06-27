<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function nationality(){
        return $this->belongsTo(Nationality::class);
    }
    public function patientMedicalHistory(){
        return $this->hasMany(PatientMedicalHistory::class);
    }
    public function patientAllergicHistory(){
        return $this->hasMany(PatientAllergicHistory::class);
    }
}
