<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/auth/signup', [AuthController::class, 'signUp'])->name('auth.signup');
    Route::get('/auth/signin', [AuthController::class, 'signIn'])->name('auth.signin');

    Route::post('/auth/store', [AuthController::class, 'storeUser'])->name('auth.store');
    Route::post('/auth/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
});

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');