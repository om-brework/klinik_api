<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ServiceCategoryController extends Controller
{
    public function show(){
        $serviceCategoryData = ServiceCategory::all();
        $data = [
            'serviceCategory' => $serviceCategoryData,
            'message'=>'Data loaded'
        ];
        return response()->json($data, 200);
    }

    public function save(Request $request){
        $serviceCategory = new ServiceCategory;
        $serviceCategory->service_categories = $request->service_categories;
        $serviceCategory->save();
        $serviceCategoryData = ServiceCategory::all();
        $message = 'Data saved';
        $data = [
            'serviceCategory' => $serviceCategoryData,
            'message'=>$message
        ];
        return response()->json($data, 200);

    }
}
