<?php
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransferCoinHistoryController;
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

Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Routes accessible to authenticated users (any role)
Route::middleware('auth')->group(function () {
    // Routes that both regular users and admins/gm can access
    Route::get('/', [DashboardController::class,'index'])->name('dashboard.index');

    Route::get('/profile', function () {
        return view('profile');
    });
    Route::post('/profile/security-password', [UserController::class, 'setSecurityPassword'])->name('security-password.set');
    Route::post('/profile/security-password/change', [UserController::class, 'changeSecurityPassword'])->name('security-password.change');
    Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('password.change');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    
    Route::get('/transferCoinHistory', [TransferCoinHistoryController::class,'index' ])->name('transferCoinHistory.index');
    Route::get('/game', [AccountController::class,'index'])->name('game');
    Route::post('/createAccount', [AccountController::class,'create'])->name('createAccount');
    Route::post('/changeAccountPassword', [AccountController::class,'changePassword'])->name('changeAccountPassword');

    Route::get('/topUpHistory', [TransactionController::class, 'show']);
    // Route::get('/transferCoinHistory', [TransfersController::class, 'index'])->name('transfer.history');
    Route::post('/transfer', [TransfersController::class, 'store'])->name('transfer.store');
    Route::post('/transfer/{transfer}/cancel', [TransfersController::class, 'cancel'])->name('transfer.cancel');

    Route::get('/shop', function () {
        return view('shop');
    });
    
    // Routes accessible only to admin or gm roles
    Route::group(['middleware' => 'admin.gm.check'], function () {
        Route::get('/admin', [AdminDashboardController::class, 'index']);
        Route::get('/users', [UserController::class, 'index'])->name('users.search');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        
        // Game accounts management
        Route::get('/gameAccounts', [AccountController::class, 'adminIndex'])->name('admin.gameAccounts');
        Route::get('/api/accounts/{id}', [AccountController::class, 'getAccountDetails'])->name('admin.account.details');
        Route::post('/api/accounts/{id}/toggle-status', [AccountController::class, 'toggleStatus'])->name('admin.account.toggle');
        Route::put('/api/accounts/{id}', [AccountController::class, 'updateAccount'])->name('admin.account.update');
        Route::post('/api/accounts', [AccountController::class, 'store'])->name('admin.account.store');
        
        // Add other admin-only routes here
        Route::get('/orderCoin', [AdminOrderCoin::class, 'show']);
        Route::post('/orderCoin/{id}/approve', [AdminOrderCoin::class, 'approve'])->name('orderCoin.approve');
        Route::post('/orderCoin/{id}/reject', [AdminOrderCoin::class, 'reject'])->name('orderCoin.reject');
        Route::get('/api/orders/{id}', [AdminOrderCoin::class, 'getOrderDetails']);
        Route::get('/api/users/{id}', [UserController::class, 'getUserDetails']);
    });

    Route::resource('transactions', TransactionController::class);
    Route::post('/transactions/{transaction}/approve', [TransactionController::class, 'approve'])->name('transactions.approve');
    Route::post('/transactions/{transaction}/decline', [TransactionController::class, 'decline'])->name('transactions.decline');
    Route::post('/transactions/{transaction}/mark-as-paid', [TransactionController::class, 'markAsPaid'])->name('transactions.mark-as-paid');

});

Route::get('/test-500', function() {
    abort(500);
});