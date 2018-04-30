<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Test;

class TestController extends Controller
{
    public function instructions() {
        $authId = Auth()->user()->id;
        if( true == empty($authId) ){
            return response()->json(['status' => false, 'message' => 'No Data found!','data' => null ]);
        }
        return response()->json(
            [
                'status' => 'success',
                'data'  =>  [
                    'id' => $authId
                ]
            ]
        );
    }
    
    public function getTestData() {

        $userId = Auth()->user()->id;
        $time=time();
        dd($time);
        // $user = User::where('id', $userId)
        //                 ->update(['test_start' => $time ]);
        
        $arrTestData = Test::select('id', 'name', 'mobile', 'address')->get();

        if( true == empty($arrTestData) ){
            return response()->json(['status' => false, 'message' => 'No Data found!','data' => null ]);
        }
        return response()->json(
            [
                'status' => 'success',
                'data'  =>  $arrTestData
            ]
        );
    }

    public function getTestDataDescription($testDataId) {

        $arrTestData = Test::select('id', 'description')
                             ->where('id', $testDataId)
                             ->get();

        if( true == empty($arrTestData) ) {
            return response()->json(['status' => false, 'message' => 'No Data found!','data' => null ]);
        } 
        return response()->json(
            [
                'status' => 'success',
                'data'  =>  $arrTestData
            ]
        );
    }
}   
