<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Test;

class TestController extends Controller
{
    public function test() {
        return view('test');
    }
    
    public function getTestData() {

        $userId = Auth()->user()->id;

        // Now Time
        $testTime = date('G:i:s');
        $arrTime = explode(":", $testTime);
        $arrNewTime = [$arrTime[0], $arrTime[1], $arrTime[2]];
        $totalMin = (($arrNewTime[0] * 60) + $arrNewTime[1]); 

        // DB Time
        $isStartTime = User::select('test_start')
                      ->where('id', $userId)->first()->toArray();
                      
        $arrdbTime = [];
        foreach ($isStartTime as $key => $value) {
            $arrdbTime = $value;
        }
        
        $arrdbTime = explode(":", $arrdbTime);
        $arrNewdbTime = [($arrdbTime[0]), $arrdbTime[1], $arrdbTime[2]];
        $totaldbMin = (($arrNewdbTime[0] * 60) + $arrNewdbTime[1]);

        if($totalMin <= $totaldbMin) {

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

        $userId = Auth()->user()->id;

        // Now Time
        $testTime = date('G:i:s');
        $arrTime = explode(":", $testTime);
        $arrNewTime = [$arrTime[0], $arrTime[1], $arrTime[2]];
        $totalMin = (($arrNewTime[0] * 60) + $arrNewTime[0]); 
    
        // DB Time
        $isStartTime = User::select('test_start')
                      ->where('id', $userId)->first()->toArray();
                      
        $arrdbTime = [];
        foreach ($isStartTime as $key => $value) {
            $arrdbTime = $value;
        }
        $arrdbTime = explode(":", $arrdbTime);
        $arrNewdbTime = [($arrdbTime[0]), $arrdbTime[1], $arrdbTime[2]];
        $totaldbMin = (($arrNewdbTime[0] * 60) + $arrNewdbTime[0]);

        if( $totalMin <= $totaldbMin ) {
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
