<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientMedicalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PatientController extends Controller
{
    public function show(){
        $patients = Patient::with('nationality')->get();
        foreach($patients as $patient){
            $dataPatient[] = array(
                'id'=>$patient->id,
                'first_name'=>$patient->first_name,
                'last_name'=>$patient->last_name,
                'country'=>$patient->country,
                'ID_type'=>$patient->ID_type,
                'ID_number'=>$patient->ID_number,
                'gender'=>$patient->gender,
                'phone_number'=>$patient->phone_number,
                'email'=>$patient->email,
                'address'=>$patient->address,
                'nationality'=>$patient->nationality['nationality'],
                'id_nationality'=>$patient->nationality['id'],
            );
        }

        $data = [
            'patients' => $dataPatient
        ];

        return response()->json($data, 200);
    }
    public function save(Request $request){
        $patient = new Patient;
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->nationality = $request->nationality;
        $patient->nationality_id = $request->nationality_id;
        $patient->id_type = $request->id_type;
        $patient->id_number = $request->id_number;
        $patient->gender = $request->gender;
        $patient->phone_number = $request->phone_number;
        $patient->email = $request->email;
        $patient->address = $request->address;
        $patient->save();
        $idPatient = $patient->id;
        $date = date('d-m-y');
        $time = date('H:m:s');
        $date2 = date('dmy');
        $time2 = date('Hms');
        $medical_record_number = "UTM-".$date2."-".$time2;

        $patientMedicalHistory = new PatientMedicalHistory;
        $patientMedicalHistory->patient_id = $idPatient;
        $patientMedicalHistory->medical_record_number = $medical_record_number;
        $patientMedicalHistory->status = $request->status;
        $patientMedicalHistory->nurse_in_charge_id = $request->nurse_in_charge_id;
        $patientMedicalHistory->doctor_in_charge_id = $request->doctor_in_charge_id;
        $patientMedicalHistory->date = $date;
        $patientMedicalHistory->time = $time;
        $patientMedicalHistory->location_id = $request->location_id;
        $patientMedicalHistory->anamnesis = $request->anamnesis;
        $patientMedicalHistory->save();

        $message = "Patient saved";
        $data = [
            'message'=> $message,
        ];

        return response()->json($data, 200);

    }
}
