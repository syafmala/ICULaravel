<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signUp(){
        return view('pages.auth.signup');
    }

    public function signIn(){
        return view('pages.auth.signin');
    }
}
