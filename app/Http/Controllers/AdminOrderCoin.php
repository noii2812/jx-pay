<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AdminOrderCoin extends Controller
{


    function getStatistic(){
        $transactions = Transaction::get();

        $statistics = [
            'totalValue' => $transactions->sum('price'),
            'completed_orders' => $transactions->where('status', 'approved')->count(),
            'pending_orders' => $transactions->where('status', 'pending')->count(),
            'declined_orders' => $transactions->where('status', 'declined')->count()
        ];

        return $statistics;
    }

    public function show(Request $request)
    {

        $transactions = Transaction::query();
        
        $status = $request->input('status');
        if ($status) {
            $transactions->where('status', $status);
        }

        $transactions = $transactions->orderBy('created_at', 'desc')->paginate(10);

        // get statistics
        $statistics = $this->getStatistic();

        $compact = compact('transactions', 'statistics');
        return view('orderCoin', $compact);
    }

    public function getOrderDetails($id)
    {
        $transaction = Transaction::with('user')->where('order_id', $id)->firstOrFail();
        
        return response()->json([
            'success' => true,
            'data' => $transaction
        ]);
    }

    public function approve($id)
    {
        $transaction = Transaction::where('order_id', $id)->firstOrFail();

        if ($transaction->status === 'pending') {
            DB::transaction(function () use ($transaction) {
                // Update transaction status
                $transaction->status = 'approved';
                $transaction->save();

                // Update user's coin balance
                $user = $transaction->user;
                if (!$user) {
                    throw new \Exception('User not found for this transaction');
                }
                $user->coin += $transaction->coin;
                $user->save();
            });

            return redirect()->back()->with('success', 'Transaction approved successfully');
        }

        return redirect()->back()->with('error', 'Transaction cannot be approved');
    }

    public function reject($id)
    {
        $transaction = Transaction::where('order_id', $id)->firstOrFail();

        if ($transaction->status === 'pending') {
            DB::transaction(function () use ($transaction) {
                // Update transaction status
                $transaction->status = 'declined';
                $transaction->declined_at = now();
                $transaction->save();
            });

            return response()->json([
                'success' => true,
                'message' => 'Transaction declined successfully'
            ]);
        }

        return redirect()->back()->with('error', 'Transaction cannot be declined');
    }
}
