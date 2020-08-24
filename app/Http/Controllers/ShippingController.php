<?php

namespace App\Http\Controllers;
use App\Shipping;
use App\Requests;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function Shipping(Request $req)
    {
        $shipping = new Shipping;
        $shipping->shipping_number = 'Shipping' . '-' . mt_rand(100,1000);
        $shipping->user_id = 1;
        $shipping->grf_number = $Goodreq->grf_number;
        $shipping->req_code = $Goodreq->grf_number;
        $shipping->save();
    }
}
