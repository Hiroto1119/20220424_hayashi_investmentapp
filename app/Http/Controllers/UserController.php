<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userData = User::all();
            return view('dashboard', ['userData' => $userData]);
    }
}