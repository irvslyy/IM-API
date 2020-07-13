<?php

namespace App\Http\Controllers;
use App\User;
use App\Heirarky;
use App\Profile;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
          $user = Auth::user();

              return response()->json([ 
                'status' => 200,
                'data' => $user,
              ]);

          }
    }
    public function HierarkyProfile(Request $req)
    {
      $loop = 1;
      $user_id = $req->id;
      $heirarky_return = [];
      $heirarky_return[0] = Profile::where('id', $user_id)->first()->DataPersonal;
      while (true) {
          $heirarky = Heirarky::where('profile_code', $user_id)->first();
          if ($heirarky == null || $user_id == 'None') {
              break;
          }
          $heirarky_data = Profile::where('id', $heirarky->supervisor_code)->first()->DataPersonal;
          $heirarky_return[$loop] = $heirarky_data;
          $user_id = $heirarky->supervisor_code;
          $loop++;
      }
      return ["status" => 200, "data" => array_reverse($heirarky_return)];
    }
}



