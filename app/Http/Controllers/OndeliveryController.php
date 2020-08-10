<?php

namespace App\Http\Controllers;
use App\Ondelivery;
use Illuminate\Http\Request;

class OndeliveryController extends Controller
{
    public function store(Request $req)
    {
        $Ondelivery = new Ondelivery;
        $Ondelivery->cod_code = $req->cod_code;
        $Ondelivery->request_code = $req->request_code;
        $Ondelivery->grf_number = $req->grf_number;
        $Ondelivery->status = $req->status;
        $Ondelivery->save();

        return response()->json([
            'status' => 200,
            'data' => $Ondelivery
        ]);
    }
}
