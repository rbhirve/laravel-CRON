<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function confirm($userId) {
        date_default_timezone_set('Asia/Kolkata');
        $authId = $userId;
        $isStartTime = User::select('id','status', 'test_start')
                      ->where('id', $authId)->first();
        
        if($isStartTime->status == 0) {

            $testTime = date('G:i:s');
            $arrTime = explode(":", $testTime);
            $arrNewTime = [($arrTime[0]+3), $arrTime[1], $arrTime[2]];
            $strTime = implode(":", $arrNewTime);
            $user = User::where('id', $authId)
                        ->update(['test_start' => $strTime ]);
                       
            $status = User::where('id', $authId)
                        ->update(['status' => 1 ]); 

            return view('test');
        }              
        else {
            return view('test', ['data' => $isStartTime]);
        }
    }

    // public function confirm($userId) {

    // }
}
