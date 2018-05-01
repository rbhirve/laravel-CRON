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

        if(Auth()->user()->status == 1) {

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

        return response()->json(
            [
                'status' => 'success',
                'message'  =>  'Your test time is finished'
            ]
        );
            
        }

    public function getTestDataDescription($testDataId) {

        if(Auth()->user()->status == 1) {
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
        
        return response()->json(
            [
                'status' => 'success',
                'message'  =>  'Your test time is finished'
            ]
        );
    }
}   
