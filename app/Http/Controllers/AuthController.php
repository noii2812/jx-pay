<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // or any protected page
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    /**
     * Show the signup form
     */
    public function showSignupForm()
    {
        return view('auth.signup');
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:20|unique:users,username',
            'password' => 'required|min:8|confirmed',
            'email' => 'nullable|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
        ]);

        // Prepare user data
        $userData = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'user',
            'status' => 'active',
            'coin' => 0,
        ];
        
        // Only add email if it's not empty
        if ($request->filled('email')) {
            $userData['email'] = $request->email;
        }
        
        // Only add phone if it's not empty
        if ($request->filled('phone')) {
            $userData['phone'] = $request->phone;
        }

        $user = User::create($userData);

        // Log the user in after registration
        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful! Welcome to the game!');
    }
}
