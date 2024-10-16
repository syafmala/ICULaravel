<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/signup', [AuthController::class, 'signUp'])->name('auth.signup');
Route::get('/auth/signin', [AuthController::class, 'signIn'])->name('auth.signin');