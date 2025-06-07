<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopUpHistoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminOrderCoin;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserRole;
use App\Http\Controllers\TransfersController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('register');

// Routes accessible to authenticated users (any role)
Route::middleware('auth')->group(function () {
    // Routes that both regular users and admins/gm can access
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/profile', function () {
        return view('profile');
    });
    Route::get('/transferCoinHistory', function () {
        return view('transferCoinHistory');
    });
    Route::get('/game', [AccountController::class,'index'])->name('game');
    Route::post('/createAccount', [AccountController::class,'create'])->name('createAccount');

    Route::get('/topUpHistory', [TransactionController::class, 'show']);
    Route::get('/transferCoinHistory', [TransfersController::class, 'index'])->name('transfer.history');
    Route::post('/transfer', [TransfersController::class, 'store'])->name('transfer.store');
    Route::post('/transfer/{transfer}/cancel', [TransfersController::class, 'cancel'])->name('transfer.cancel');

    Route::get('/shop', function () {
        return view('shop');
    });
    
    // Routes accessible only to admin or gm roles
    Route::group(['middleware' => 'admin.gm.check'], function () {
        Route::get('/admin', function () {
            return view('admin');
        });
        Route::get('/users', [UserController::class, 'index'])->name('users.search');
        
        // Add other admin-only routes here
        Route::get('/orderCoin', [AdminOrderCoin::class, 'show']);
        Route::post('/orderCoin/{id}/approve', [AdminOrderCoin::class, 'approve'])->name('orderCoin.approve');
        Route::post('/orderCoin/{id}/reject', [AdminOrderCoin::class, 'reject'])->name('orderCoin.reject');
    });

    Route::resource('transactions', TransactionController::class);
    Route::post('/transactions/{transaction}/approve', [TransactionController::class, 'approve'])->name('transactions.approve');
    Route::post('/transactions/{transaction}/decline', [TransactionController::class, 'decline'])->name('transactions.decline');
    Route::post('/transactions/{transaction}/mark-as-paid', [TransactionController::class, 'markAsPaid'])->name('transactions.mark-as-paid');

});