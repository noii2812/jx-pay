<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopUpHistoryController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/transferCoinHistory', function () {
    return view('transferCoinHistory');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/game', function () {
    return view('game');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login/forgot', function () {
    return view('forgotpassword');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/topUpHistory', [TopUpHistoryController::class, 'index']);
