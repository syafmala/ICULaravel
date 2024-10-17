<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signUp(){
        return view('pages.auth.signup');
    }

    public function signIn(){
        return view('pages.auth.signin');
    }

    public function storeUser(Request $request){

        $validated_request = $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required | min:6',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){
            return back()->withErrors([
                'email' => 'The provided email is already registered.',
            ])->withInput();
        }

        User::create($validated_request);

        return redirect()->route('auth.signin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('feeds');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect()->route('auth.signin');
}
}
