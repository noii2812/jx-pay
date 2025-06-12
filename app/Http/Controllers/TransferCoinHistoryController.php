<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferCoinHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get total transfers count for current user
        $totalTransfers = Transfer::where('user_id', $user->id)->count();

        // Get total coins transferred for current user
        $totalCoinsTransferred = Transfer::where('user_id', $user->id)
            ->where('status', 'completed')
            ->sum('coin');

        // Get today's transfers count for current user
        $todayTransfers = Transfer::where('user_id', $user->id)
            ->whereDate('completed_at', Carbon::today())
            ->count();

        $totalAccounts = Account::where('ref', $user->id)->count();

        // Get paginated transfer records for current user
        $transfers = Transfer::where('user_id', $user->id)
            ->with(['user'])
            ->orderBy('completed_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('transferCoinHistory', compact(
            'totalTransfers',
            'totalCoinsTransferred',
            'todayTransfers',
            'transfers',
            'totalAccounts'
        
        ));
    }
}
