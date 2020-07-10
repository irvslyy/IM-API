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
                'hierarky' => $heirarky_return

              ]);

          }
    }
    public function logout()
    {
      
    }
}



