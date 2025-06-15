<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Set security password for the first time
     */
    public function setSecurityPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_security_password' => 'required|min:6|confirmed',
            'new_security_password_confirmation' => 'required'
        ], [
            'new_security_password.required' => 'Please enter a security password',
            'new_security_password.min' => 'Security password must be at least 6 characters',
            'new_security_password.confirmed' => 'Security password confirmation does not match',
            'new_security_password_confirmation.required' => 'Please confirm your security password'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = auth()->user();
        
        if ($user->secpassword) {
            return response()->json([
                'status' => 'error',
                'message' => 'Security password is already set'
            ], 400);
        }

        $user->secpassword = Hash::make($request->new_security_password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Security password has been set successfully'
        ]);
    }

    /**
     * Change existing security password
     */
    public function changeSecurityPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_security_password' => 'required',
            'new_security_password' => 'required|min:6|confirmed',
            'new_security_password_confirmation' => 'required'
        ], [
            'current_security_password.required' => 'Please enter your current security password',
            'new_security_password.required' => 'Please enter a new security password',
            'new_security_password.min' => 'New security password must be at least 6 characters',
            'new_security_password.confirmed' => 'New security password confirmation does not match',
            'new_security_password_confirmation.required' => 'Please confirm your new security password'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = auth()->user();
        
        if (!$user->security_password) {
            return response()->json([
                'status' => 'error',
                'message' => 'Security password is not set'
            ], 400);
        }

        if (!Hash::check($request->current_security_password, $user->security_password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Current security password is incorrect'
            ], 400);
        }

        $user->security_password = Hash::make($request->new_security_password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Security password has been changed successfully'
        ]);
    }

    public function getUserDetails($id)
    {
        $user = User::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'status' => 'required|string|in:active,pending,inactive',
            'coin' => 'required|integer|min:0',
        ]);
        
        // Only update password if provided
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }
        
        $user->update($validatedData);
        
        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Check if user is not an admin
        if ($user->role === 'admin' || $user->role === 'gm') {
            return redirect()->back()->with('error', 'Cannot delete admin or GM users');
        }
        
        $user->delete();
        
        return redirect()->back()->with('success', 'User deleted successfully');
    }
} 