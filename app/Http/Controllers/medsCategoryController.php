<?php

namespace App\Http\Controllers;

use App\Models\MedsCategory;
use Illuminate\Http\Request;

class medsCategoryController extends Controller
{
    public function show(){
        $dataMedCategories = MedsCategory::all();
        $data = [
            'dataMedsCategories' => $dataMedCategories,
            'message' =>'data loaded'
        ];
        return response()->json($data, 200);
    }
    public function save(Request $request){
        $medsCategory = new MedsCategory;
        $medsCategory->meds_categories = $request->meds_categories;
        $medsCategory->save();
        $message = 'Data saved';
        $dataMedCategories = MedsCategory::all();
        $data = [
            'dataMedsCategories' => $dataMedCategories,
            'message' =>$message
        ];
        return response()->json($data, 200);

    }
}
