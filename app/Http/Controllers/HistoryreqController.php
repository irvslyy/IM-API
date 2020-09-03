<?php

namespace App\Http\Controllers;
use App\History;
use App\Req;
use App\Stock;
use App\Goodreq;
use App\ItemMaster;
use Illuminate\Http\Request;

class HistoryreqController extends Controller
{
    public function check()
    {
        $itemMaster = ItemMaster::where('segment_code',$id)->get();
        $history = History::where('ADMIN_STATUS','LIKE','%Approve%')->get();
        for ($i=0; $i < count($itemMaster); $i++) { 
            for ($j=0; $j < count($history); $j++) { 
                $itemMaster[$i]->terpakai = Req::where('product_name',$itemMaster[$i]->product_name)->get();
            }
        }

        return $itemMaster;
    }   
}
