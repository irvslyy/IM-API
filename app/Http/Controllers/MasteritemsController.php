<?php

namespace App\Http\Controllers;
use App\ItemMaster;
use App\Req;
use App\Goodreq;
use App\Items;
use App\Stock;
use App\User;
use Illuminate\Http\Request;

class MasteritemsController extends Controller
{
    /**
     * 
     * DISINI KODINGAN UNTUK 
     * USAGE BALANCE INLINE CLOSURE
     * 
    */

    public function usage(Request $req,$id)
    {
        $itemMaster = ItemMaster::where('segment_code',$id)->get();
        
        for ($i=0; $i < count($itemMaster); $i++) { 
            $items = Items::all();
           
            for ($e=0; $e < count($items); $e++) { 
                $itemMaster[$i]->tersisa = Items::where('product_name',$itemMaster[$i]->product_name)->count() - Req::where('product_name',$itemMaster[$i]->product_name)->count();     
                $itemMaster[$i]->terpakai = Req::where('product_name',$itemMaster[$i]->product_name)->count(); 
                $itemMaster[$i]->total = Items::where('product_name',$itemMaster[$i]->product_name)->count(); 
            }
        }

        return $itemMaster;
    }

    public function usagePerWarehouse(Request $req,$segment)
    {
        $item = ItemMaster::where('segment_code',$segment)->get();
        $stock = Stock::where('wh_code', $req->wh_code)->get();
        for ($i = 0; $i < count($item); $i++) {
            $qty = 0;
            for ($j = 0; $j < count($stock); $j++) {
                if ($stock[$j]->item->product_name == $item[$i]->product_name) {
                    $qty++;
                } 
            
            
            $data = Items::where('product_name', $item[$i]->product_name)->get();
            $requester =  Req::where('product_name',$item[$i]->product_name)->count();
            if ($qty != null) {
                $data->qty = $qty;
            } 
            
                $item[$i]->tersisa = $qty - Req::where('product_name', $item[$i]->product_name)->where('wh_code',$stock[$j]->wh_code)->count();
                $item[$i]->terpakai = Req::where('product_name', $item[$i]->product_name)->where('wh_code',$stock[$j]->wh_code)->count();
                $item[$i]->total = $qty;
            }
            
        }

        return response()->json([
            $item
        ]);
    }

    public function Percentage(Request $req, $segment)
    {
        $item = ItemMaster::where('segment_code',$segment)->get();
        $stock = Stock::where('wh_code', $req->wh_code)->get();
        for ($i = 0; $i < count($item); $i++) {
            $qty = 0;
            for ($j = 0; $j < count($stock); $j++) {
                if ($stock[$j]->item->product_name == $item[$i]->product_name) {
                    $qty++;
                } 
            
            
            $data = Items::where('product_name', $item[$i]->product_name)->get();
            $requester =  Req::where('product_name',$item[$i]->product_name)->count();
            if ($qty != null) {
                $data->qty = $qty;
            } 
            
                $item[$i]->tersisa = $qty - Req::where('product_name', $item[$i]->product_name)->where('wh_code',$stock[$j]->wh_code)->count();
                $item[$i]->terpakai = Req::where('product_name', $item[$i]->product_name)->where('wh_code',$stock[$j]->wh_code)->count();
                $item[$i]->total = $qty;

                $requester = Req::where('product_name', $item[$i]->product_name)->where('wh_code',$stock[$j]->wh_code)->count();
          
                $item[$i]->Percentage = ($qty!=0)?($qty * 100) / 1:0;

                $b = 10;
                $a = 0.1;
                $result =  $a * 100 /$b;
            }
            
        }

        return response()->json([
            'testting' => $requester,
            'data' => $item,
        ]);
    }

}


