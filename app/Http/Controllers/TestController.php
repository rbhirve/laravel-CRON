<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Test;

class TestController extends Controller
{
    public function getTestData() {
        
        $arrTestData = Test::select('id', 'name', 'mobile', 'address')->get();

        if( true == empty($arrTestData) ){
            return response()->api(false, 'No Data found!', null);
        }
        return response($arrTestData);
    }

    public function getTestDataDescription($testDataId) {

        $arrTestData = Test::select('id', 'description')
                             ->where('id', $testDataId)
                             ->get();

        if( true == empty($arrTestData) ) {
            return response()->api(false, 'No Data found!', null);
        }
        return response($arrTestData);
    }
}
