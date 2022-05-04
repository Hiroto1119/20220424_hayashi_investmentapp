<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function アクション名()
    {
        $userData = User::all();
            return view('dashboard', ['userData' => $userData]);
    }
}
