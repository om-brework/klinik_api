<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationContrroller extends Controller
{
    public function show(){
        $dataLocation = Location::all();
        $data = [
            'dataLocations' => $dataLocation,
            'message'=>'Data loaded'
        ];
        return response()->json($data, 200);
    }
    public function save(Request $request){
        $location = new Location;
        $location->clinic_name = $request->clinic_name;
        $location->address = $request->address;
        $location->save();
        $message = 'Data saved';
        $dataLocation = Location::all();
        $data = [
            'dataLocations' => $dataLocation,
            'message'=>'Data loaded'
        ];
        return response()->json($data, 200);
    }
}
