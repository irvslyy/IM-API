<?php

namespace App\Http\Controllers;

use App\Req;
use App\Stock;
use App\Items;
use App\ItemMaster;
use App\Segment;
use App\User;
use DB;
use Str;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class ReqController extends Controller
{
    /**
     * 
     * DISINI KODINGAN UNTUK 
     * USAGE BALANCE INLINE CLOSURE
     * 
    */
    public function masterItems($product)
    {
        $reqs = Req::where('product_code',$product)->sum('qty');
        $products = ItemMaster::where('product_code',$product)->select('product_code','product_name')->groupBy('product_code','product_name')->first();
        $product = ItemMaster::where('product_code',$product)->count();
        $q = $product - $reqs;

        return [
            'item' => $products,
            'terpakai' => $reqs,
            'sisa' => $q,
            'total' => $reqs + $q,
        ];
    }

    /**
     * 
     * DISINI KODINGAN UNTUK 
     * USAGE BALANCE OTB
     * 
    */
    public function masterItemsOtb($product)
    {
        $reqs = Req::where('product_code',$product)->sum('qty');
        $product_name = Req::where('product_code',$product)->select('product_code','product_name')->groupBy('product_code','product_name')->first();
        $products = ItemMaster::where('product_code',$product)->select('product_code','product_name','segment_code')->groupBy('product_code','product_name','segment_code')->first();
        $product = ItemMaster::where('product_code',$product)->count();
        $q = $product - $reqs;

        return [
            'item' => $products,
            'terpakai' => $reqs,
            'sisa' => $q,
            'total' => $reqs + $q,
        ];
    }

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
        $requ  =  Req::where('SPV', $id)->where('TL_STATUS','=','Approve')->get();
        for ($i=0; $i < count($requ); $i++) { 
            return ['status' => 200, "data" => $requ];
        }
        return ['status' => 500, "data" => 'nothing'];

    }
    public function apiGetReqMNG($id)
    {
        $requ  = Req::where('MNG', $id)->where('SPV_STATUS','=','Approve')->get();
        for ($i=0; $i < count($requ); $i++) { 
            return ['status' => 200, "data" => $requ];
        }
        return ['status' => 500, "data" => 'nothing'];
    }

    /**
     * 
     * DISINI KODINGAN STORE DATA REQUESTS
     * 
     * 
    */
    public function store(Request $req)
    {
        $Items  = Items::all();
        // $result  = Count($Items) - 1;

        for ($i=0; $i < Count($Items); $i++) { 
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
            $requ->status = $req->status;
            $requ->save();
                    
            return ['status' => 200, 'sisa stock' => Count($Items),"data" => $requ];
      
        }
            return ['status' => 500, "message" => 'stock habis'];
        
    }   
    

    /**
     * DISINI KODINGAN UPDATE STATUS APPROVAL 
     * DARI SPV SAMPAI MNG BAGIAN REQUESTS
     * 
     * 
    */
    public function apiUpdateTLSTATUS(Request $request,$code)
    {
        $requester = Req::where('request_code',$code)->update(['TL_STATUS' => $request->TL_STATUS]);
        $requester_data = Req::where('request_code',$code)->get();

        return ['status' => 200, "data" => $requester_data];
    }

    public function apiUpdateSPVSTATUS(Request $request,$code)
    {
        $requester = Req::where('request_code',$code)->update(['SPV_STATUS' => $request->SPV_STATUS]);
        $requester_data = Req::where('request_code',$code)->get();

        return ['status' => 200, "data" => $requester_data];
    }

    public function apiUpdateMNGSTATUS(Request $request,$code)
    {
        $requester = Req::where('request_code',$code)->update(['MNG_STATUS' => $request->MNG_STATUS]);
        $requester_data = Req::where('request_code',$code)->get();

        return ['status' => 200, "data" => $requester_data];
    }

     /**
     * DISINI KODINGAN UPDATE STATUS APPROVAL 
     * ADMIN IM YANG DI WEB
     * 
     * 
    */
    public function apiUpdateADMINSTATUS(Request $request,$code)
    {
        $requester = Req::where('request_code',$code)->update(['ADMIN_STATUS' => $request->ADMIN_STATUS]);
        $requester_data = Req::where('request_code',$code)->get();

        return ['status' => 200, "data" => $requester_data];
    }

    public function mngStatusReq()
    {
        $requester = Req::where('MNG_STATUS','=','Approve')->get();

        return ['status' => 200, "data" => $requester];
    }
}






