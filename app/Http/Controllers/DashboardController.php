<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Transfer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $coin = $user->coin;
        $accounts = $user->accounts()->count();

        // Calculate total topups
        $totalTopups = Transaction::where('user_id', $user->id)
            ->where('status', 'approved')
            ->sum('coin');

        // Get daily transaction data for the last 7 days
        $transactions = Transaction::where('user_id', $user->id)
            ->where('status', 'approved')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(coin) as total_coins')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Get recent transfers for the table
        $recentTransfers = Transfer::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Prepare data for the chart
        $dates = [];
        $coinData = [];
        
        // Initialize last 7 days with 0 values
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('d');
            $dates[] = $date;
            $coinData[] = 0;
        }

        // Fill in actual transaction data
        foreach ($transactions as $transaction) {
            $dayIndex = array_search(
                Carbon::parse($transaction->date)->format('d'),
                $dates
            );
            if ($dayIndex !== false) {
                $coinData[$dayIndex] = (int)$transaction->total_coins;
            }
        }

        return view("dashboard", compact("coin", "accounts", "dates", "coinData", "recentTransfers", "totalTopups"));
    }
}
