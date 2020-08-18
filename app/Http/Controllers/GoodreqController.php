<?php

namespace App\Http\Controllers;
use App\Goodreq;
use App\Req;
use App\Stock;
use App\Items;
use App\History;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class GoodreqController extends Controller
{

    /**
     * DISINI KODINGAN UNTUK MENDAPATKAN
     * DATA PER USERS BERDASARKAN EMPLOYEE NUMBER
     * 
     * 
    */
    public function GRF($emp)
    {
        $Goodreq = Goodreq::where('employee_number','=',Crypt::encryptString(Hash::make($emp)))->get();        
        return response()->json([
            'status' => 200,
            'non disaster' => $Goodreq,
        ]);
    }
    public function encrypter()
    {
        $encrypter = Crypt::encryptString(Hash::make(12));
        $decrypter = Crypt::decryptString($encrypter);
        return response()->json([
            'encrypter' => $encrypter,
            'decrypter' => $decrypter,
            'real id' => 12
        ]);
    }
    public function getGRF()
    {
        $grf = Goodreq::all();
        for ($i=0; $i < count($grf); $i++) { 
            for ($j=0; $j < count($grf); $j++) { 
                $grf[$i]->item = Items::where('items_code',$grf[$i]->items_code)->select('items_code','product_code','product_name')->groupBy('items_code','product_code','product_name')->get();
            }
        }

        return response()->json([
            'status' => 200,
            'data' => $grf
        ]);
    }

    /**
     * 
     * DISINI KODINGAN UNTUK STORE
     * GOOD FORM REQUESTS
     * 
    */
    public function store(Request $req)
    {
        $Goodreq = new Goodreq;
        $Goodreq->grf_number = $req->grf_number;
        $Goodreq->heir_code = $req->heir_code;
        $Goodreq->employee_number = $req->employee_number;
        $Goodreq->access_code = $req->access_code;
        $Goodreq->status = $req->status;
        $Goodreq->wh_code = $req->wh_code;
        $Goodreq->disaster_reason = $req->disaster_reason;
        if ($req->disaster_reason !== null) {
            $Goodreq->SPV_STATUS = 'Approve';
            $Goodreq->MNG_STATUS = 'Approve';
            $Goodreq->delegate_id = $req->delegate_id;
        } 
        $Goodreq->user_id = $req->user_id;
        $Goodreq->SPV = $req->id_spv;
        $Goodreq->MNG = $req->id_mgm;
        $Goodreq->save();

        return response()->json([
            'status' => 200,
            'data' => $Goodreq
        ]);

    }
    
    
    
    /**
     * DISINI KODINGAN UPDATE STATUS APPROVAL 
     * DARI SPV SAMPAI MNG BAGIAN GOOD FORM REQUESTS
     * 
     * 
    */
    public function grfUpdate(Request $request,$id)
    {
        $Goodreq = History::where('request_code',Crypt::encryptString(Hash::make($id)))->first();
        $Goodreq->STATUS_PACKAGE = $request->status;
        $Goodreq->save();

        return response()->json([
            'status' => 200,
            'data' => $Goodreq
        ]);
    }
    
    public function apiGrfUpdateSPVSTATUS(Request $req,$id)
    {
        $requ = Goodreq::where('grf_number',$id)->first();
        $requ = History::where('request_code',$id)->update(['SPV_STATUS' => $req->SPV_STATUS ]);
        $grf = Goodreq::where('grf_number',$id)->get();

        for ($i=0; $i < count($grf); $i++) { 
            $grf[$i]->history = History::where('request_code',$grf[$i]->grf_number)->get();
        }

        return response()->json([
            'status' => 200,
            'data' => $grf
        ]);
    }

    public function apiGrfUpdateMNGSTATUS(Request $req,$id)
    {
        $requ = Goodreq::where('grf_number',$id)->first();
        $requ = History::where('request_code',$id)->update(['MNG_STATUS' => $req->MNG_STATUS ]);
        $grf = Goodreq::where('grf_number',$id)->get();

        for ($i=0; $i < count($grf); $i++) { 
            $grf[$i]->history = History::where('request_code',$grf[$i]->grf_number)->get();
        }

        return response()->json([
            'status' => 200,
            'data' => $grf
        ]);
    }

    /**
     * DISINI KODINGAN UPDATE STATUS APPROVAL 
     * ADMIN IM YANG DI WEB
     * 
     * 
    */
    
    public function MngStatusGrf(Request $request,$wh_code)
    {   
        $goodrequest = History::where('wh_code',$wh_code)->where('STATUS_PACKAGE','!=','Shipping')->where('status','!=','Done')->where('MNG_STATUS','like','%Approve%')->where('ADMIN_STATUS','like','%Approve%')->get();
        for ($i=0; $i < count($goodrequest); $i++) { 
            $goodrequest[$i]->qty = Req::where('request_code',$goodrequest[$i]->request_code)->where('wh_code',$wh_code)->sum('qty');
        }

        for ($i=0; $i < count($goodrequest); $i++) { 
           $goodrequest[$i]->item = Req::where('request_code',$goodrequest[$i]->request_code)->where('wh_code',$wh_code)->get();
        }
        
        return response()->json([
            'status' => 200,
            'data' => $goodrequest
        ]);    
    }

    public function MngStatusAll()
    {
        $grf = History::where('MNG_STATUS','like','%Approve%')->where('ADMIN_STATUS',null)->get();
        for ($i=0; $i < count($grf); $i++) { 
            $grf[$i]->qty = Req::where('request_code',$grf[$i]->request_code)->sum('qty');
        }

        for ($i=0; $i < count($grf); $i++) { 
           $grf[$i]->item = Req::where('request_code',$grf[$i]->request_code)->get();
        }

        return response()->json([
            'status' => 200,
            'data' => $grf
        ]);
    }

    public function MngStatusAllDisaster()
    {
        $disaster = Goodreq::where('MNG_STATUS','like','%Approve%')->where('ADMIN_STATUS',null)->where('delegate_id','!=',null)->get();
        for ($i=0; $i < count($disaster); $i++) { 
            $disaster[$i]->qty = Req::where('request_code',$disaster[$i]->grf_number)->sum('qty');
        }

        for ($i=0; $i < count($disaster); $i++) { 
           $disaster[$i]->item = Req::where('request_code',$disaster[$i]->grf_number)->get();
        }

        return ["disaster" => $disaster];
    }

    public function MngStatusAllByGnumber($grf_number)
    {
        $grf = Goodreq::where('grf_number',$grf_number)->get();
        for ($i=0; $i < count($grf); $i++) { 
            $grf[$i]->qty = Req::where('request_code',$grf[$i]->grf_number)->sum('qty');
        }

        for ($i=0; $i < count($grf); $i++) { 
            $grf[$i]->history = History::where('id',$grf[$i]->history_id)->get();
        }

        for ($i=0; $i < count($grf); $i++) { 
           $grf[$i]->item = Req::where('request_code',$grf[$i]->grf_number)->get();
        }

        return response()->json([
            'status' => 200,
            'data' => $grf
        ]);
    }

    public function UserStatusGrf($id)
    {
        $user = Goodreq::where('user_id',$id)->get();

        for ($q=0; $q < count($user); $q++) { 

            for ($i=0; $i < count($user); $i++) { 
                $user[$i]->qty = Req::where('request_code',$user[$i]->grf_number)->where('user_id',$id)->sum('qty');
            }
            for ($i=0; $i < count($user); $i++) { 
            $user[$i]->item = Req::where('request_code',$user[$i]->grf_number)->where('user_id',$id)->get();
            }

            $users = Goodreq::where('delegate_id',$user[$q]->user_id)->where('disaster_reason','!=',NULL)->get();
            for ($e=0; $e < count($users); $e++) { 
                $users[$e]->qty = Req::where('request_code',$users[$e]->grf_number)->where('user_id',$users[$e]->user_id)->sum('qty');
            }
            for ($e=0; $e < count($users); $e++) { 
                $users[$e]->item = Req::where('request_code',$users[$e]->grf_number)->where('user_id',$users[$e]->user_id)->get();
                $users[$e]->user = User::where('id',$users[$e]->user_id)->get();
            }
            

            return response()->json([
                'status' => 200,
                'non disaster' => $user,
                'disaster' => $users
            ]);
        }
    }
    
    /**
     * DISINI KODINGAN UPDATE STATUS BARANG 
     * DARI SETELAH APPROVAL SAMPAI BARANG
     * SUDAH DI TANGAN REQUESTER
     * 
    */
    public function Update_Status()
    {
        $Goodreq = Goodreq::where('user_id',$id)->first();
        $Goodreq->status = $request->status;
        $Goodreq->save();

        return response()->json([
            'status' => 200,
            'data' => $Goodreq
        ]);
    }

    public function UpdatingProsesStatus(Request $request,$grf_number)
    {
        $updateStatusProses = Goodreq::where('grf_number',$grf_number)->update(['status' => $request->status]);
        $updateStatusProses = History::where('request_code',$grf_number)->update(['STATUS_PACKAGE' => $request->status, 'STATUS_DATE_PACKAGE' => date('y-m-d H:i:s') ]);
        $updateStatusProses = Goodreq::where('grf_number',$grf_number)->get();

        return response()->json([
            'status' => 200,
            'data' => $updateStatusProses
        ]);
    }
    
    public function userDisaster($id)
    {
        $user = Goodreq::where('delegate_id',Crypt::encryptString(hash($id)))->get();
        $users = User::all(); 
        for ($i=0; $i < count($user); $i++) { 
            $user[$i]->qty = Req::where('request_code',$user[$i]->grf_number)->where('user_id',$id)->sum('qty');
        }

        for ($i=0; $i < count($user); $i++) { 
           $user[$i]->item = Req::where('request_code',$user[$i]->grf_number)->where('user_id',$id)->get();
        }
        
        for ($i=0; $i < count($users); $i++) { 
            $user[$i]->user = User::where('id',$id)->get();
        }

        return response()->json([
            'status' => 200,
            'data' => $user
        ]);
    }

}









