<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions.
     */
    public function index()
    {
        $transactions = Transaction::with('user')
            ->latest()
            ->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new transaction.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created transaction in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'price' => 'required|numeric|min:0',
            'coin' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'description' => 'nullable|string',
            'payment_methods' => 'nullable|array'
        ]);

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'reference_id' => 'TRX-' . Str::random(10),
            'price' => $validated['price'],
            'coin' => $validated['coin'],
            'payment_method' => $validated['payment_method'],
            'description' => $validated['description'] ?? null,
            'payment_methods' => $validated['payment_methods'] ?? null,
            'status' => 'pending',
            'approved_by' => Auth::id()
        ]);

        return redirect()->route('transactions.show', $transaction)
            ->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified transaction.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified transaction.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified transaction in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'price' => 'required|numeric|min:0',
            'coin' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'description' => 'nullable|string',
            'payment_methods' => 'nullable|array'
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.show', $transaction)
            ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified transaction from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }

    /**
     * Approve the specified transaction.
     */
    public function approve(Transaction $transaction)
    {
        DB::transaction(function () use ($transaction) {
            $transaction->update([
                'status' => 'approved',
                'approved_at' => now()
            ]);
        });

        return redirect()->route('transactions.show', $transaction)
            ->with('success', 'Transaction approved successfully.');
    }

    /**
     * Decline the specified transaction.
     */
    public function decline(Transaction $transaction)
    {
        DB::transaction(function () use ($transaction) {
            $transaction->update([
                'status' => 'declined',
                'declined_at' => now()
            ]);
        });

        return redirect()->route('transactions.show', $transaction)
            ->with('success', 'Transaction declined successfully.');
    }

    /**
     * Mark the specified transaction as paid.
     */
    public function markAsPaid(Transaction $transaction)
    {
        DB::transaction(function () use ($transaction) {
            $transaction->update([
                'status' => 'paid',
                'paid_at' => now()
            ]);
        });

        return redirect()->route('transactions.show', $transaction)
            ->with('success', 'Transaction marked as paid successfully.');
    }
}
