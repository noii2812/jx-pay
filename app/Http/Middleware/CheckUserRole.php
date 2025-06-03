<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Get authenticated user
        $user = $request->user();

        // If user is not authenticated, redirect to login
        if (!$user) {
            return redirect('/login');
        }

        // If user role is in the allowed roles or is an admin/gm
        if (in_array($user->role, $roles) || in_array($user->role, ['admin', 'gm'])) {
            return $next($request);
        }

        // Redirect to dashboard with error message
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
