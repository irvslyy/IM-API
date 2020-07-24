<?php

namespace App\Http\Controllers;
use App\Goodreq;
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
        $Goodreq->TL = $req->id_tl;
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

    public function apiGrfUpdateTLSTATUS(Request $req,$id)
    {
        $requ = Goodreq::where('id',$id)->first();
        $requ->TL_STATUS = $req->TL_STATUS;
        $requ->save();

        return ['status' => 200, "data" => $requ];
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

}
