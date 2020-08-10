<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Segment;
use App\ItemMaster;
use App\Items;
use DB;
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
        // dd($req->wh_code);
        $segment = Segment::all();
        if ($req->departemen) {
            $segment = Segment::where('departemen', $req->departemen)->get();
        }

        // i di balikin ke 0
        for ($i = 0; $i < count($segment); $i++) {
            $masterItem = ItemMaster::where('segment_code', $segment[$i]->id)->get();
            $segment[$i]->qty = 0;
            $qty = 0;
            if (count($masterItem) != 0) {
                for ($j = 0; $j < count($masterItem); $j++) {
                    $item = Items::where('product_name', $masterItem[$j]->product_name)->get();
                    $qty_2 = 0;
                    if (count($item) != 0) {
                        for ($l = 0; $l <  count($item); $l++) {
                            if ($req->wh_code == "all") {
                                $stock = Stock::where('items_code', $item[$l]->id)->count();
                            } else {
                                $stock = Stock::where('items_code', $item[$l]->id)->where('wh_code', $req->wh_code)->count();
                            }
                            $qty_2 = $stock + $qty_2;
                        }
                        $segment[$i]->item = $masterItem;
                        $qty = $qty_2 + $qty;
                        $masterItem[$j]->qty = $qty_2;
                    } else {
                        $segment[$i]->item = $masterItem;
                        $masterItem[$j]->qty = 0;
                    }
                }
                $segment[$i]->qty =  $qty;
            } else {
                $segment[$i]->item = [];
            }
        }
        return ["data" => $segment];
    }

    public function apiStockMobile(Request $req)
    {
        $item = ItemMaster::all();
        for ($i = 0; $i < count($item); $i++) {
            $item[$i]->data = Items::where('product_name', $item[$i]->product_name)->first();
        }

        return ["data" => $item];
    }
}
