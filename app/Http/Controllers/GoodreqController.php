<?php

namespace App\Http\Controllers;
use App\Goodreq;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class GoodreqController extends Controller
{
    public function store(Request $req)
    {
        $Goodreq = new Goodreq;
        $wh = 'JKT';
        $config = ['table' => 'Grf','field'=> 'grf_number', 'length' => 6, 'prefix' => $wh.'-'];
        $id = IdGenerator::generate($config);

        $Goodreq->grf_number = $id;
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
