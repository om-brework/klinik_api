<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServicePrice;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function save(Request $request){
        $service = new Service;
        $service->services = $request->services;
        $service->service_category_id = $request->service_category_id;
        $service->save();
        $id = $service->id;

        $servicePriceWNI = new ServicePrice;
        $servicePriceWNI->service_id = $id;
        $servicePriceWNI->price = $request->harga_wni;
        $servicePriceWNI->nationality_id = 1;
        $servicePriceWNI->save();
        $servicePriceWNA = new ServicePrice;
        $servicePriceWNA->service_id = $id;
        $servicePriceWNA->price = $request->harga_wna;
        $servicePriceWNA->nationality_id = 2;
        $servicePriceWNA->save();


        $dataService = Service::with('service_category','service_price')->get();
        $dataToSend = array();
        $harga_wna = 0;
        $harga_wni=0;
        foreach($dataService as $a){
            foreach($a->service_price as $b){
                if($b->nationality_id == 1){
                    $harga_wni = $b->price;
                }else{
                    $harga_wna=$b->price;
                }
            }
            $dataToSend[]=array(
                'id'=>$a->id,
                'service'=>$a->services,
                'service_category'=>$a->service_category['service_categories'],
                'harga_wni'=>$harga_wni,
                'harga_wna'=>$harga_wna
            );

        };
        $data = [
            'services'=> $dataToSend
        ];
        return response()->json($data, 200);
    }
    public function show(){
        $dataService = Service::with('service_category','service_price')->get();
        $dataToSend = array();
        $harga_wna = 0;
        $harga_wni=0;
        foreach($dataService as $a){
            foreach($a->service_price as $b){
                if($b->nationality_id == 1){
                    $harga_wni = $b->price;
                }else{
                    $harga_wna=$b->price;
                }
            }
            $dataToSend[]=array(
                'id'=>$a->id,
                'service'=>$a->services,
                'service_category'=>$a->service_category['service_categories'],
                'harga_wni'=>$harga_wni,
                'harga_wna'=>$harga_wna
            );

        };
        $data = [
            'services'=> $dataToSend
        ];
        return response()->json($data, 200);
    }
}
