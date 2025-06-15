<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get statistics for the dashboard
        $totalCoins = User::sum('coin');
        $todaySales = Transaction::whereDate('created_at', Carbon::today())
                        ->where('status', 'approved')
                        ->count();
        $pendingOrders = Transaction::where('status', 'pending')->count();
        $totalRevenue = Transaction::where('status', 'approved')->sum('price');

        // Get recent transactions for the order coin list
        $recentTransactions = Transaction::with('user')
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();

        // Get recent users
        $recentUsers = User::where('role', '!=', 'admin')
                    ->where('role', '!=', 'gm')
                    ->orderBy('created_at', 'desc')
                    ->take(10)
                    ->get();

        return view('admin', compact(
            'totalCoins', 
            'todaySales', 
            'pendingOrders', 
            'totalRevenue', 
            'recentTransactions', 
            'recentUsers'
        ));
    }
} 