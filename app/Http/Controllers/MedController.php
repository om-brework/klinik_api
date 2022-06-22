<?php

namespace App\Http\Controllers;

use App\Models\Med;
use App\Models\MedsPrice;
use App\Models\MedsStock;
use Illuminate\Http\Request;

class MedController extends Controller
{
    public function show(Request $request){
        $idLokasi = $request->location_id;
        $dataObat = Med::with('meds_category','meds_price')->get();
        $dataToSend = array();
        $harga_wna = 0;
        $harga_wni=0;
        foreach($dataObat as $a){
            $stocks = MedsStock::where([['med_id','=',$a->id],['location_id','=',$idLokasi]])->first();
            if($stocks){
                $stock = $stocks->qty;
            }else{
                $stock = 0;
            }
            foreach($a->meds_price as $b){
                if($b->nationality_id == 1){
                    $harga_wni = $b->retail_price;
                }else{
                    $harga_wna=$b->retail_price;
                }
            }
            $dataToSend[]=array(
                'id'=>$a->id,
                'med'=>$a->medicine,
                'med_category'=>$a->meds_category['meds_categories'],
                'harga_beli'=>$a->base_price,
                'harga_wni'=>$harga_wni,
                'harga_wna'=>$harga_wna,
                'stock'=>$stock
            );

        };
        $data = [
            'meds'=> $dataToSend
        ];
        return response()->json($data, 200);
    }
    public function save(Request $request){

        $medicine = new Med;
        $medicine->medicine = $request->medicine;
        $medicine->base_price = $request->base_price;
        $medicine->SKU = $request->sku;
        $medicine->meds_category_id = $request->category;
        $medicine->save();

        $medicineID = $medicine->id;

        $medicineStock = new MedsStock;
        $medicineStock->med_id= $medicineID;
        $medicineStock->location_id = $request->location_id;
        $medicineStock->qty = $request->qty;
        $medicineStock->save();
        $idLokasi = $request->location_id;

        $hargaWNI = new MedsPrice;
        $hargaWNI->med_id = $medicineID;
        $hargaWNI->retail_price = $request->harga_wni;
        $hargaWNI->nationality_id = 1;
        $hargaWNI->save();
        $hargaWNA = new MedsPrice;
        $hargaWNA->med_id = $medicineID;
        $hargaWNA->retail_price = $request->harga_wna;
        $hargaWNA->nationality_id = 2;
        $hargaWNA->save();

        $dataObat = Med::with('meds_category','meds_price')->get();
        $dataToSend = array();
        $harga_wna = 0;
        $harga_wni=0;
        foreach($dataObat as $a){
            $stocks = MedsStock::where([['med_id','=',$a->id],['location_id','=',$idLokasi]])->first();
            if($stocks){
                $stock = $stocks->qty;
            }else{
                $stock = 0;
            }
            foreach($a->meds_price as $b){
                if($b->nationality_id == 1){
                    $harga_wni = $b->retail_price;
                }else{
                    $harga_wna=$b->retail_price;
                }
            }
            $dataToSend[]=array(
                'id'=>$a->id,
                'med'=>$a->medicine,
                'med_category'=>$a->meds_category['meds_categories'],
                'harga_beli'=>$a->base_price,
                'harga_wni'=>$harga_wni,
                'harga_wna'=>$harga_wna,
                'stock'=>$stock
            );

        };
        $data = [
            'meds'=> $dataToSend
        ];
        return response()->json($data, 200);

    }
}
