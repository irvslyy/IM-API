<?php

namespace App\Http\Controllers;
use App\Goodreq;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class GoodreqController extends Controller
{

    public function GRF($emp)
    {
        $Goodreq = Goodreq::where('employee_number','=',$emp)->get();
        return response()->json([
            'status' => 200,
            'data' => $Goodreq
        ]);
    }

    public function store(Request $req)
    {
        $Goodreq = new Goodreq;
        $Goodreq->grf_number = $req->grf_number;
        $Goodreq->heir_code = $req->heir_code;
        $Goodreq->employee_number = $req->employee_number;
        $Goodreq->access_code = $req->access_code;
        $Goodreq->status = $req->status;
        $Goodreq->save();

        return response()->json([
            'status' => 200,
            'data' => $Goodreq
        ]);
    }
}
