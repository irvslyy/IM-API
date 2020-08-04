<?php

namespace App\Http\Controllers;
use App\User;
use App\Heirarky;
use App\Profile;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $successStatus = 200;


    // if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
    //   $user = Auth::user();
    //   $success['token'] =  $user->createToken('nApp')->accessToken;
    //   return response()->json(['success' => $success], $this->successStatus);
    // }
    // else{
    //     return response()->json(['error'=>'Unauthorised'], 401);
    // }

    public function login(Request $request)
    {
        //ATTEMPT & CHECK THE CREDS
        if(Auth::attempt($request->only('email','password'))) {
          
          //GET USERS DATA
          $user = Auth::user();
          $success['token'] = $user->createToken('nApp')->accessToken;

          // LOOP FOR GET THE HIRARCHY
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

          //THE RESPONSE IS SUCCESSFUL
          return response()->json([ 
            'status' => 200,
            'Access Token' => $success,
            'data' => $user,
            'hirarky' => $heirarky_return
          ], $this->successStatus);

        
        } else {
          // THE RESPONSE IF FAILED
          return response()->json(['error' => 'Unauthorized Access'], 401);
        }
    }

    public function register(Request $request)
    {
        //REGISTER THE USERS
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
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



