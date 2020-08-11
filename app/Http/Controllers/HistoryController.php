<?php

namespace App\Http\Controllers;
use App\History;
use App\Goodreq;
use App\Req;
use App\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * 
     * DISINI UNTUK MENDAPATKANN ALL HISTORY 
     * TANPA FILTER SEKALIPUN
     * 
    */
    public function History()
    {
        $history = History::all();

        return response()->json([
            'status' => 200,
            'data' => $history
        ]);
    }

    /**
     * DISINI UNTUK MENDAPATKAN HISTORY 
     * BERDASARKAN FILTER REQUEST CODE
     * 
     * 
    */
    public function History_users($request_code)
    {
        $history = History::where('request_code',$request_code)->get();
     
        return response()->json([
            'status' => 200,
            'data' => $history
        ]);
    }

    /**
     * 
     * DISINI POST USER_ID,REQUEST_CODE,ID TL, SPV, MNG
     * UNTUK KEBUTUHAN FILTERING HISTORY APPROVAL
     * 
    */
    public function History_store(Request $request)
    {
        $history = new History;
        $history->user_id = $request->user_id;
        $history->request_code = $request->request_code;
        $history->TL = $request->TL;
        $history->SPV = $request->SPV;
        $history->MNG = $request->MNG;
        $history->save();

        return response()->json([
            'status' => 200,
            'data' => $history
        ]);
    }


}
