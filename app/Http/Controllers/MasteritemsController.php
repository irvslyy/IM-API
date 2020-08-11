<?php

namespace App\Http\Controllers;
use App\ItemMaster;
use App\Req;
use App\Goodreq;
use App\Items;
use Illuminate\Http\Request;

class MasteritemsController extends Controller
{
    /**
     * 
     * DISINI KODINGAN UNTUK 
     * USAGE BALANCE INLINE CLOSURE
     * 
    */
    public function masterItems($segment)
    {    
       $masterItem = Items::where('product_name','=','INLINE CLOSURE - 48 CORE')->count();
       for ($i=0; $i < count($masterItem); $i++) { 
          $usageBalance = Req::where('product_name',$masterItem[$i]->product_name)->get();
          return $usageBalance;
       }

       return response([
           'item' => $masterItem,
       ]);
       
    }
    
}
