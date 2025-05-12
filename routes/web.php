<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/coin', function () {
    return view('tradecoin');
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