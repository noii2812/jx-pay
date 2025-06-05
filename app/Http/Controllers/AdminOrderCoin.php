<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class AdminOrderCoin extends Controller
{
    
    public function show()
    {
        $transactions = Transaction::paginate(10);

        $totalCoins = $transactions->sum('coin');
        $approvedCount = $transactions->where('status', 'approved')->count();
        $pendingCount = $transactions->where('status', 'pending')->count();
        $totalValue = $transactions->sum('price');

        $statistics = [
            'completed_orders' => $transactions->where('status', 'approved')->count(),
            'pending_orders' => $transactions->where('status', 'pending')->count(),
            'declined_orders' => $transactions->where('status', 'declined')->count()
        ];

        $compact = compact('transactions', 'totalCoins', 'approvedCount', 'pendingCount', 'totalValue', 'statistics');

        return view('orderCoin', $compact);
    }

}
