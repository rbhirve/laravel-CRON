<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function signup(Request $request)
    {
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);

      $token = auth()->login($user);

      return  response()->json($user);
    }
    
    public function login(){
        if( auth()->attempt(['email' => request('email'), 'password' => request('password')]) )
        {
            $token =  auth()->user()->createToken('MyApp')->accessToken;
            return response()->json(['status'=> 'success', 'token' => $token], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * User details api
     *
     * @return \Illuminate\Http\Response
     */
    public function userDetails()
    {
        $user = auth()->user(); // or you can use request()->user()
        return response()->json(['status'=> 'success', 'token' => $user], 200);
    }

}
