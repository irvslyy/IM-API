<?php

namespace App\Http\Controllers;
use App\Req;
use Str;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class ReqController extends Controller
{
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
        $str = Str::random(80);
        $uuid = Uuid::generate();
        $encrypt = Crypt::encryptString($uuid);
        $requ->api_tokens = hash('sha256',$encrypt); 
        $requ->qty = $req->qty;
        $requ->status = 'pending';
        $requ->save();

        if ($requ) {
            return response()->json([
                'status' => 200,
                'data' => $requ
            ]);
        }
    }
}
