<?php

namespace App\Http\Controllers;

use App\Req;
use Str;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class ReqController extends Controller
{
    /**
     * 
     * DISINI KODINGAN UNTUK 
     * MENDAPATKAN TL,SPV,MNG
     * 
    */
    public function apiGetReqTl($id)
    {
        $requ  =  Req::where('TL', $id)->get();
        return ['status' => 200, "data" => $requ];
    }
    public function apiGetReqSPV($id)
    {
        $requ  =  Req::where('SPV', $id)->get();
        return ['status' => 200, "data" => $requ];
    }
    public function apiGetReqMNG($id)
    {
        $requ  =  Req::where('MNG', $id)->get();
        return ['status' => 200, "data" => $requ];
    }

    /**
     * 
     * DISINI KODINGAN STORE DATA REQUESTS
     * 
     * 
    */
    public function store(Request $req)
    {
        $requ  = new Req;
        $requ->request_code = $req->request_code;
        $requ->request_list = $req->request_list;
        $requ->stock_code = $req->stock_code;
        $requ->items_code = $req->items_code;
        $requ->wh_code = $req->wh_code;
        $requ->product_code = $req->product_code;
        $requ->product_name = $req->product_name;
        $requ->TL = $req->id_tl;
        $requ->SPV = $req->id_spv;
        $requ->MNG = $req->id_mgm;
        $requ->qty = $req->qty;
        $requ->status = 'pending';
        $requ->save();

        return ['status' => 200, "data" => $requ];
    }
    

    /**
     * DISINI KODINGAN UPDATE STATUS APPROVAL 
     * DARI SPV SAMPAI MNG BAGIAN REQUESTS
     * 
     * 
    */
    public function apiUpdateSPVSTATUS(Request $req,$id)
    {
        $requ = Req::where('id',$id)->first();
        $requ->SPV_STATUS = $req->SPV_STATUS;
        $requ->save();

        return ['status' => 200, "data" => $requ];
    }

    public function apiUpdateMNGSTATUS(Request $req,$id)
    {
        $requ = Req::where('id',$id)->first();
        $requ->MNG_STATUS = $req->MNG_STATUS;
        $requ->save();

        return ['status' => 200, "data" => $requ];
    }

}
