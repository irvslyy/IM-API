<?php

namespace App\Http\Controllers;

use App\Req;
use App\Stock;
use App\Items;
use App\ItemMaster;
use App\Segment;
use App\Goodreq;
use App\User;
use App\History;
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
     * MENDAPATKAN TL,SPV,MNG
     * 
    */
    public function apiGetReqSPV($id)
    {
        $request_ = History::where('SPV', $id)->where('SPV_STATUS','=',Null)->get();
        for ($i=0; $i < count($request_); $i++) {
            $req = Req::where('request_code',$request_[$i]->request_code)->get();
            return response()->json([
                'status' => 200,
                'data' => $req
            ]);
        }
        return response()->json([
            'status' => 404,
            'data' => 'no data available'
        ]);
    }
    
    public function apiGetReqMNG($id)
    {
        $request_ = History::where('MNG', $id)->where('SPV_STATUS','like','%Approve%')->where('disaster_reason','=',null)->where('MNG_STATUS','=',null)->get();
        for ($i=0; $i < count($request_); $i++) { 
            $req = Req::where('request_code',$request_[$i]->request_code)->get();
            return response()->json([
                'status' => 200,
                'data' => $req,
            ]);
        }
        
        return response()->json([
            'status' => 404,
            'data' => 'no data available'
        ]);
        
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

        for ($i=0; $i < Count($Items); $i++) { 
            $requ  = new Req;
            $requ->request_code = $req->request_code;
            $requ->request_list = $req->request_list;
            $requ->stock_code = $req->stock_code;
            $requ->items_code = $req->items_code;
            $requ->wh_code = $req->wh_code;
            $requ->product_code = $req->product_code;
            $requ->product_name = $req->product_name;
            $requ->SPV = $req->id_spv;
            $requ->MNG = $req->id_mgm;
            $requ->qty = $req->qty;
            $requ->unit = $req->unit;
            $requ->status = $req->status;
            $requ->disaster_reason = $req->disaster_reason;
            if ($req->disaster_reason !== null) {
                $requ->SPV_STATUS = 'Approve';
            }
            $requ->user_id = $req->user_id;
            $requ->save();
                    
            return response()->json([
                'status' => 200,
                'sisa stock' =>  Count($Items),
                'data' => $requ
            ]);
        }
            return response()->json([
                'status' => 404,
                'message' => 'stock habis'
            ]);
        
    }   
    

    /**
     * DISINI KODINGAN UPDATE STATUS APPROVAL 
     * DARI SPV SAMPAI MNG BAGIAN REQUESTS
     * 
     * 
    */
    public function apiUpdateSPVSTATUS(Request $request,$code)
    {
        $goodrequest = Goodreq::all();
        for ($i=0; $i < count($goodrequest); $i++) { 
            $requester = Req::where('request_code',$code)->update(['SPV_STATUS' => $request->SPV_STATUS]);
            $goodrequest = Goodreq::where('grf_number',$code)->update(['SPV_STATUS' => $request->SPV_STATUS]);
            $requester = History::where('request_code',$code)->update(['SPV_STATUS' => $request->SPV_STATUS, 'SPV_APPROVAL_DATE' => date('y-m-d H:i:s') ]);

            return response()->json([
                'status' => 200,
                'message' => 'update success'
            ]);
        }

        return response()->json([
            'status' => 404,
            'data' => 'no ada available'
        ]);
    }

    public function apiUpdateMNGSTATUS(Request $request,$code)
    {
        $goodrequest = Goodreq::all();
        for ($i=0; $i < count($goodrequest); $i++) { 
            $requester = Req::where('request_code',$code)->update(['MNG_STATUS' => $request->MNG_STATUS]);
            $goodrequest = Goodreq::where('grf_number',$code)->update(['MNG_STATUS' => $request->MNG_STATUS]);
            $requester = History::where('request_code',$code)->update(['MNG_STATUS' => $request->MNG_STATUS, 'MNG_APPROVAL_DATE' => date('y-m-d H:i:s')]);

            return response()->json([
                'status' => 200,
                'message' => 'update success'
            ]);
        }
        return response()->json([
            'status' => 404,
            'message' => 'no ada available'
        ]);
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
        $requester_grf = Goodreq::where('grf_number',$code)->update(['ADMIN_STATUS' => $request->ADMIN_STATUS]);
        $requester = History::where('request_code',$code)->update(['ADMIN_STATUS' => $request->ADMIN_STATUS, 'ADMIN_APPROVAL_DATE' => date('y-m-d H:i:s')]);
        $requester_data = Req::where('request_code',$code)->get();
        for ($i=0; $i < count($requester_grf); $i++) { 
            return response()->json([
                'status' => 200,
                'message' => 'update success'
            ]);
        }

        return response()->json([
            'status' => 500,
            'message' => 'update failed'
        ]);
    }

    public function mngStatusReq()
    {
        $requester = History::where('MNG_STATUS','like','%Approve%')->get();
        return response()->json([
            'status' => 200,
            'data' => $requester
        ]);
    }
}






