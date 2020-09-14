<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Segment;
use App\ItemMaster;
use App\Items;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function Stock()
    {
        $stock = Stock::all();
        return response()->json([
            'status' => 200,
            'data' => $stock
        ]);
    }

    public function StockApi(Request $req)
    {
        $item = Cache::remember('item', 3, function (){
            return ItemMaster::MasterItems()->get();
        });

        $stock = Stock::where('wh_code', $req->wh_code)->where('status','like','%True%')->get();
      
        for ($i = 0; $i < count($item); $i++) {
            $qty = 0;
            for ($j = 0; $j < count($stock); $j++) {
                if ($stock[$j]->item->product_name == $item[$i]->product_name) {
                    $qty++;
                } 
            }
            $data = Items::where('product_name', $item[$i]->product_name)->first();
            if ($qty != null) {
                $data->qty = $qty;
            } 
            $item[$i]->data = $data;
        }

        return response()->json([
            'data' => $item,
        ]);
    }

    public function apiStockMobile(Request $req)
    {
        $item = Cache::remember('item', 3, function (){
            return ItemMaster::MasterItems()->get();
        });

        for ($i = 0; $i < count($item); $i++) {
            $item[$i]->data = Items::where('product_name', $item[$i]->product_name)->first();
        }

        return reponse()->json([
            'data' => $item
        ]);
    }

}