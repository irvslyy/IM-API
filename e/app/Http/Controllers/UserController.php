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

          $loop = 1;
          $user_id = Auth::user()->id;
          $heirarky_return = [];
          $heirarky_return[0] = User::where('id', $user_id)->first();
          
              while (true) {
                  $heirarky = User::where('id', $user_id)->first();
                  if ($heirarky == null || $user_id == 'None') {
                  break;
              }
              
              $heirarky_data = User::where('id', $heirarky->parent_id)->first();
              $heirarky_return[$loop] = $heirarky_data;
              $user_id = $heirarky->parent_id;
              $loop++;
          }
          
          
              return response()->json([ 
                'status' => 200,
                'data' => $user,
                'hirarki' => $heirarky_return
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



