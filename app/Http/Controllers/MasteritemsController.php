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
    

}


