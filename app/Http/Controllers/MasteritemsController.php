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

    public function usagePerWarehouse(Request $req,$segment_code)
    {   
        // $itemMaster = ItemMaster::where('segment_code',$id)->get();
        // $stock = Stock::where('wh_code',$wh_code)->get();
        // $stock = Items::all();
        // for ($i=0; $i < count($itemMaster); $i++) { 
        //     $itemMaster[$i]->tersisa = Items::where('product_name',$itemMaster[$i]->product_name)->count();
            
        //     for ($j=0; $j < count($stock); $j++) { 
        //         $itemMaster[$i]->qty = Stock::where('items_code',$stock[$j]->id)->where('wh_code',$wh_code)->count();
        //     }

        // }
        
        $item = ItemMaster::where('segment_code',$segment_code)->get();
        $stock = Stock::where('wh_code',$req->wh_code)->get();
        for ($i=0; $i < count($item); $i++) { 
            $qty = 0;
            for ($j=0; $j < count($stock); $j++) { 
                $qty++;
            }
            $data = Items:: where('product_name', $item[$i]->product_name)->get();
            if ($qty != null) {
                $data->qty = $qty;
            } 
            $item[$i]->tersisa = count($data);
        }

        return $item;

    }
    
}


