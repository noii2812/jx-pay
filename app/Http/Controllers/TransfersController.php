<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransfersController extends Controller
{
    /**
     * Display a listing of the transfers.
     */
    public function index()
    {
        $transfers = Transfer::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('transferCoinHistory', compact('transfers'));
    }

    /**
     * Store a newly created transfer in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'to_account' => 'required|integer|exists:account,id',
            'coin' => 'required|integer|min:1',
            // 'password' => 'required|string',
        ]);

        try {
            $user = Auth::user();
            $result = DB::transaction(function () use ($validated, $user) {
                // Verify password
                // if (!Hash::check($validated['password'], $user->password)) {
                //     throw new \Exception('Invalid password');
                // }

                // Check if user has enough coins
                if ($user->coin < $validated['coin']) {
                    throw new \Exception('Insufficient coins');
                }

                // Check if destination account exists
                $destinationAccount = Account::find($validated['to_account']);
                if (!$destinationAccount) {
                    throw new \Exception('Destination account not found');
                }

                // 00 * 2 =
                $totalCoin = $validated['coin'] *1 ;
                // Create the transfer record
                $transfer = Transfer::create([
                    'user_id' => $user->id,
                    'to_account' => $validated['to_account'],
                    'coin' => $validated['coin'],
                    'status' => 'completed',
                    'description' => "Transfer to account ID: {$validated['to_account']}",
                    'completed_at' => now()
                ]);

                // Update coins
                $user->decrement('coin', $validated['coin']);
                $destinationAccount->increment('coin', $totalCoin);

                // dd($transfer);
                return [
                    'success' => true,
                    'remaining_coins' => $user->coin
                ];
            });

            return redirect()->route('game')->with('success', 'Transfer completed successfully. Remaining coins: ' . $result['remaining_coins']);

        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('game')->with('error', 'Transfer failed: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified transfer.
     */
    public function show(Transfer $transfer)
    {
        return view('transfers.show', compact('transfer'));
    }

    /**
     * Cancel a pending transfer.
     */
    public function cancel(Transfer $transfer)
    {
        if ($transfer->status === 'pending') {
            $transfer->update([
                'status' => 'cancelled',
                'completed_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Transfer cancelled successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Only pending transfers can be cancelled'
        ], 400);
    }
}
