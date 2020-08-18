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
    public function login(Request $request)
    {
        //ATTEMPT & CHECK THE CREDS
        if(Auth::attempt($request->only('email','password'))) {
          
          //GET USERS DATA
          $user = Auth::user();
          $success['token'] = $user->createToken('nApp')->accessToken;

          // LOOP TO GET THE HIRARCHY
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
      
      return response()->json([
        'status' => 200,
        'data' => array_reverse($heirarky_return)
      ]);
    }



    public function getStaffFromManager($id)
    {
      $staff = User::where('role','like','%staff%')->where('mng_id',Crypt::encryptString($id))->get();
      for ($i=0; $i < count($staff); $i++) { 
        return response()->json([
          'status' => 200,
          'total staff' => count($staff),
          'data' => $staff
        ]);
      }
      return response()->json([
        'status' => 404,
        'message' => 'manager id not found'
      ]);
    }

    public function updateToken(Request $request ,$id)
    {
      $updateToken = User::where('id',$id)->update(['token' => $request->token]);
      $user = User::find($id);
      return response()->json([
        'status' => 200, 
        'data' => $user
      ]);
    }

    public function PostToken(Request $request,$id)
    {
      $postToken = User::find($id);
      $postToken->token = $request->token;
      $postToken->save();

      return response(['status' => 200,'data' => $postToken]);
    }
}



