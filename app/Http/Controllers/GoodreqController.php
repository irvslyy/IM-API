<?php

namespace App\Http\Controllers;
use App\Goodreq;
use App\Req;
use App\Stock;
use App\Items;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class GoodreqController extends Controller
{
    /**
     * DISINI KODINGAN UNTUK MENDAPATKAN
     * DATA PER USERS BERDASARKAN EMPLOYEE NUMBER
     * 
     * 
    */
    public function GRF($emp)
    {
        $Goodreq = Goodreq::where('employee_number','=',$emp)->get();
        return response()->json([
            'status' => 200,
            'data' => $Goodreq
        ]);
    }
    public function getGRF()
    {
        $grf = Goodreq::all();
        for ($i=0; $i < count($grf); $i++) { 
            for ($j=0; $j < count($grf); $j++) { 
                $grf[$i]->item = Items::where('items_code',$grf[$i]->items_code)->select('items_code','product_code','product_name')->groupBy('items_code','product_code','product_name')->get();
            }
        }
        return ["data" => $grf];
    }

    /**
     * 
     * DISINI KODINGAN UNTUK STORE
     * GOOD FORM REQUESTS
     * 
    */
    public function store(Request $req)
    {
        $Goodreq = new Goodreq;
        $Goodreq->grf_number = $req->grf_number;
        $Goodreq->heir_code = $req->heir_code;
        $Goodreq->employee_number = $req->employee_number;
        $Goodreq->access_code = $req->access_code;
        $Goodreq->status = $req->status;
        $Goodreq->disaster_reason = $req->disaster_reason;
        if ($req->disaster_reason !== null) {
            $Goodreq->SPV_STATUS = 'Approve';
        }
        $Goodreq->user_id = $req->user_id;
        $Goodreq->SPV = $req->id_spv;
        $Goodreq->MNG = $req->id_mgm;
        $Goodreq->save();

        return response()->json([
            'status' => 200,
            'data' => $Goodreq
        ]);
    }
    
    
    /**
     * DISINI KODINGAN UPDATE STATUS APPROVAL 
     * DARI SPV SAMPAI MNG BAGIAN GOOD FORM REQUESTS
     * 
     * 
    */
    public function grfUpdate(Request $request,$id)
    {
        $Goodreq = Goodreq::where('grf_number',$id)->first();
        $Goodreq->status = $request->status;
        $Goodreq->save();

        return response()->json([
            'status' => 200,
            'data' => $Goodreq
        ]);
    }
    
    public function apiGrfUpdateSPVSTATUS(Request $req,$id)
    {
        $requ = Goodreq::where('id',$id)->first();
        $requ->SPV_STATUS = $req->SPV_STATUS;
        $requ->save();

        return ['status' => 200, "data" => $requ];
    }

    public function apiGrfUpdateMNGSTATUS(Request $req,$id)
    {
        $requ = Goodreq::where('id',$id)->first();
        $requ->MNG_STATUS = $req->MNG_STATUS;
        $requ->save();

        return ['status' => 200, "data" => $requ];
    }



    /**
     * DISINI KODINGAN UPDATE STATUS APPROVAL 
     * ADMIN IM YANG DI WEB
     * 
     * 
    */
    public function apiGrfUpdateADMINSTATUS(Request $request,$code)
    {
        $requester = Goodreq::where('grf_number',$code)->update(['ADMIN_STATUS' => $request->ADMIN_STATUS]);
        $requester_data = Goodreq::where('grf_number',$code)->get();

        return ['status' => 200, "data" => $requester_data];
    }
    public function MngStatusGrf(Request $request,$wh_code)
    {   
        $grf = Goodreq::where('MNG_STATUS','=','Approve')->get();
        for ($i=0; $i < count($grf); $i++) { 
            $grf[$i]->qty = Req::where('request_code',$grf[$i]->grf_number)->where('wh_code',$wh_code)->sum('qty');
         }

        for ($i=0; $i < count($grf); $i++) { 
           $grf[$i]->item = Req::where('request_code',$grf[$i]->grf_number)->where('wh_code',$wh_code)->get();
        }
        
        return ["data" => $grf];

    }

    public function MngStatusAll()
    {
        $grf = Goodreq::where('MNG_STATUS','=','Approve')->get();
        for ($i=0; $i < count($grf); $i++) { 
            $grf[$i]->qty = Req::where('request_code',$grf[$i]->grf_number)->sum('qty');
         }

        for ($i=0; $i < count($grf); $i++) { 
           $grf[$i]->item = Req::where('request_code',$grf[$i]->grf_number)->get();
        }

        return ['status' => 200, "data" => $grf];
    }

    public function UserStatusGrf($id)
    {
        $user = Goodreq::where('user_id',$id)->get();

        for ($i=0; $i < count($user); $i++) { 
            $user[$i]->qty = Req::where('request_code',$user[$i]->grf_number)->where('user_id',$id)->sum('qty');
         }

        for ($i=0; $i < count($user); $i++) { 
           $user[$i]->item = Req::where('request_code',$user[$i]->grf_number)->where('user_id',$id)->get();
        }
        
        return ["data" => $user];
    }

    /**
     * DISINI KODINGAN UPDATE STATUS BARANG 
     * DARI SETELAH APPROVAL SAMPAI BARANG
     * SUDAH DI TANGAN REQUESTER
     * 
    */
    public function Update_Status()
    {
        $Goodreq = Goodreq::where('user_id',$id)->first();
        $Goodreq->status = $request->status;
        $Goodreq->save();

        return ['status' => 200,'data' => $Goodreq];

    }
}




