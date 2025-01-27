<?php

use App\Http\Controllers\AIController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () { return view('home'); })->name('home');
Route::get('/home/{name}', function () { return view('home', ['name' => "team"]); });
Route::get('/home/{name}', function ($name) { return view('home', ['name' => $name]); });

Route::get('/about', function () { return view('about'); })->name('about');

Route::get('/auth/signin', function () { return view('auth.signin'); });

//Named Route - alias of a route user.profile = /pengguna/profile
Route::get('/user/profile', function () { return 'New User Profile'; })->name('user.profile');

//Route Param
Route::get('/user/{name}', function ($name) { return 'User '.$name; });

//Redirect route to named route
Route::get('/redirect-to-profile', function () { return redirect()->route('user.profile'); });

//Route Group
Route::prefix('food')->group(function () {
    Route::get('/details', function (){ return 'Food details are following'; });
    Route::get('/home', function (){ return view('Food home page'); });
});

//Combination of all above (Route, Named Route, Route Param, Route Group, Route Prefix)
Route::name('job')->prefix('job')->group(function () {
    Route::get('home', function (){ return 'Job home page'; })->name('.home');
    Route::get('details', function (){ return 'Job details are following'; })->name('.description');
});

// nak bg arahan pada laravel utk baca route web.php dari folder routes->feed
require __DIR__.'/feed/web.php';
require __DIR__.'/tag/web.php';
require __DIR__.'/auth/web.php';

Route::get('/ai/feed', [AIController::class, 'generateAIPage'])->name('ai.feed');

