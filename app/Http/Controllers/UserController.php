<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the users with optional filtering.
     */
    public function index(Request $request)
    {
        $query = User::query();
        
        // Apply search filter if provided
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('username', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('full_name', 'LIKE', "%{$search}%");
            });
        }
        
        // Apply status filter if provided
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Get results
        $users = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        $totalUsers = User::count();
        
        if ($request->filled('search') || $request->filled('status')) {
            $filteredCount = $query->count();
            return view('users', compact('users', 'totalUsers', 'filteredCount'));
        }
        
        return view('users', compact('users', 'totalUsers'));
    }
    
    /**
     * Display the specified user.
     */
    public function show(string $id): JsonResponse
    {
        try {
            // Only allow authenticated users or API calls from the same origin
            if (!auth()->check() && !request()->headers->get('referer')) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            
            $user = User::findOrFail($id);
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
} 