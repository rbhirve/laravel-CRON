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

        $authId = $userId;
        $testTime = date('G:i:s');
        $user = User::where('id', $authId)
                      ->update(['test_start' => $testTime ]);
        return view('test');
    }
}
