<?php

namespace App\Http\Controllers;

use App\Models\TopUpHistory;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class TopUpHistoryController extends Controller
{
    public function index()
    {
        $staticData = [
            [
                'id' => 1,
                'order_id' => 'ORD-001',
                'reference_number' => 'REF-001',
                'coin_amount' => 5000,
                'price' => 100.00,
                'payment_method' => 'qr',
                'status' => 'approved',
                'created_at' => Carbon::parse('2024-03-21 10:30:00')
            ],
            [
                'id' => 2,
                'order_id' => 'ORD-002',
                'reference_number' => 'REF-002',
                'coin_amount' => 2000,
                'price' => 40.00,
                'payment_method' => 'cash',
                'status' => 'approved',
                'created_at' => Carbon::parse('2024-03-21 11:15:00')
            ],
            [
                'id' => 3,
                'order_id' => 'ORD-003',
                'reference_number' => 'REF-003',
                'coin_amount' => 10000,
                'price' => 200.00,
                'payment_method' => 'qr',
                'status' => 'pending',
                'created_at' => Carbon::parse('2024-03-21 12:00:00')
            ],
            [
                'id' => 4,
                'order_id' => 'ORD-004',
                'reference_number' => 'REF-004',
                'coin_amount' => 1000,
                'price' => 20.00,
                'payment_method' => 'qr',
                'status' => 'approved',
                'created_at' => Carbon::parse('2024-03-21 13:45:00')
            ],
            [
                'id' => 5,
                'order_id' => 'ORD-005',
                'reference_number' => 'REF-005',
                'coin_amount' => 3000,
                'price' => 60.00,
                'payment_method' => 'cash',
                'status' => 'pending',
                'created_at' => Carbon::parse('2024-03-21 14:30:00')
            ],
            [
                'id' => 6,
                'order_id' => 'ORD-006',
                'reference_number' => 'REF-006',
                'coin_amount' => 7500,
                'price' => 150.00,
                'payment_method' => 'qr',
                'status' => 'approved',
                'created_at' => Carbon::parse('2024-03-21 15:15:00')
            ],
            [
                'id' => 7,
                'order_id' => 'ORD-007',
                'reference_number' => 'REF-007',
                'coin_amount' => 15000,
                'price' => 300.00,
                'payment_method' => 'cash',
                'status' => 'approved',
                'created_at' => Carbon::parse('2024-03-21 16:00:00')
            ],
            [
                'id' => 8,
                'order_id' => 'ORD-008',
                'reference_number' => 'REF-008',
                'coin_amount' => 500,
                'price' => 10.00,
                'payment_method' => 'qr',
                'status' => 'pending',
                'created_at' => Carbon::parse('2024-03-21 16:45:00')
            ]
        ];

        // Convert the array to a collection
        $collection = collect($staticData);

        // Get current page from query string
        $page = request()->get('page', 1);
        $perPage = 5;

        // Slice the collection to get the items for the current page
        $items = $collection->slice(($page - 1) * $perPage, $perPage);

        // Create a paginator instance
        $topUpHistory = new LengthAwarePaginator(
            $items,
            $collection->count(),
            $perPage,
            $page,
            ['path' => request()->url()]
        );

        // Add helper methods to match the Eloquent model
        $topUpHistory->getCollection()->transform(function ($item) {
            return (object) $item;
        });

        return view('topUpHistory', [
            'topUpHistory' => $topUpHistory,
            'totalCoins' => $collection->sum('coin_amount'),
            'approvedCount' => $collection->where('status', 'approved')->count(),
            'pendingCount' => $collection->where('status', 'pending')->count(),
            'totalValue' => $collection->sum('price')
        ]);
    }
}
