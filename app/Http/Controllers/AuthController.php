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
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required'
        ]);

        // Verify CAPTCHA
        $userInput = strtolower($request->input('captcha'));
        $sessionCaptcha = strtolower(session('captcha'));

        if ($userInput !== $sessionCaptcha) {
            return back()->withErrors([
                'captcha' => 'Invalid CAPTCHA. Please try again.',
            ]);
        }

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // or any protected page
        }

        return back()->withErrors([
            // 'username' => 'The provided credentials do not match our records.',
            'username' => 'Invalid Username or Password',
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
            'phoneNumber' => 'nullable|string|max:20',
            'captcha' => 'required'
        ]);

        // Verify CAPTCHA
        $userInput = strtolower($request->input('captcha'));
        $sessionCaptcha = strtolower(session('captcha'));

        if ($userInput !== $sessionCaptcha) {
            return back()->withErrors([
                'captcha' => 'Invalid CAPTCHA. Please try again.',
            ])->withInput();
        }

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
            $userData['phoneNumber'] = $request->phone;
        }

        $user = User::create($userData);

        // Log the user in after registration
        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful! Welcome to the game!');
    }

    public function showResetPasswordForm()
    {
        return view('auth.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'security_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !password_verify($request->security_password, $user->secpassword)) {
            return back()->withErrors([
                'security_password' => 'Invalid username or security password.',
            ]);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Your password has been reset successfully!');
    }
}
