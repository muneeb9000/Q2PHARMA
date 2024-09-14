<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the request has an API token in the headers
        if ($request->hasHeader('api_token')) {
            $token = $request->header('api_token');
            
            // Find the user by API token
            $user = User::where('api_token', $token)->first();
            
            if ($user) {
                // Log the user in using Auth
                Auth::login($user);
                return $next($request);
            }
            
            // Return a 401 Unauthorized response if the token is invalid
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // If not an API request, use session-based authentication
        if (Auth::check()) {
            return $next($request);
        }

        // Redirect to login if neither token nor session auth is valid
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
