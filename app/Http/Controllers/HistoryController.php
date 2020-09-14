<?php

namespace App\Http\Controllers;
use App\History;
use App\ItemMaster;
use App\Req;
use App\Goodreq;
use App\Items;
use App\Stock;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function History()
    {
        $history = Cache::remember('history', 3, function(){
            return History::HistoryData()->get();
        }); 

        return ['status' => 200, 'data' => $history];
    }

    public function History_users($request_code)
    {
        $history = History::where('request_code',$request_code)->get();
        return ['status' => 200, 'data' => $history];
    }

    public function History_store(Request $request)
    {
        $history = new History;
        $history->user_id = $request->user_id;
        $history->request_code = $request->request_code;
        $history->TL = $request->TL;
        $history->SPV = $request->SPV;
        $history->MNG = $request->MNG;
        $history->save();

        return ['status' => 200, 'data' => $history];
    }

    public function historyADMIN()
    {
        $history = History::all();
        $request = Req::all();
        $itemMaster = ItemMaster::all();

        for ($i=0; $i < count($history); $i++) { 
            if ($history[$i]->ADMIN_STATUS == 'Approve') {
                if (!$history[$i]->tersisa == 0) {
                    $history[$i]->tersisa = $qty - Req::where('request_code',$history[$i]->request_code)->where('history_id',$history[$i]->id)->get();
                }

                if (!$history[$i]->terpakai == 0) {
                    $history[$i]->terpakai = Req::where('ADMIN_STATUS','like','%Approve%')->where('request_code',$history[$i]->request_code)->where('history_id',$history[$i]->id)->get();
                }

                if (!$history[$i]->total == 0) {
                    $history[$i]->total = $qty;
                }

                return response()->json([
                    'status' => 200,
                    'message' => 'accept',
                    'data' => $history,
                    'jumlah data admin approve' => count($history),
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'failed',
                    'data' => NULL,
                ]);
            }
            
        }

    }


}
