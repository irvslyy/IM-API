<?php

namespace App\Http\Controllers;
use App\History;
use App\ItemMaster;
use App\Req;
use App\Goodreq;
use App\Items;
use App\Stock;
use App\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function History()
    {
        $history = History::all();
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
}
