<?php

namespace App\Http\Controllers;
use App\ItemMaster;
use App\Req;
use App\Goodreq;
use Illuminate\Http\Request;

class MasteritemsController extends Controller
{
    /**
     * 
     * DISINI KODINGAN UNTUK 
     * USAGE BALANCE INLINE CLOSURE
     * 
    */
    public function masterItems()
    {    
        $inline_closure = ItemMaster::all();
        for ($i=0; $i < count([$inline_closure]); $i++) { 
            $requester[$i] = Req::where('product_code',$inline_closure[$i]->product_code)->get();
            $count = 0;
            $result = count($inline_closure) - count($requester);
            if ($requester <= 0) {
                return ['status' => 201,'message' => 'no data'];
            }
            return [
                'status' => 200,
                'result' => $result,
                'INLINE CLOSURE' => $requester,
            ];
        }  
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

}
