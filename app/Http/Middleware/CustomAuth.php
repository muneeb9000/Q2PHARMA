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
     
        if ($request->hasHeader('api_token')) {
            $token = $request->header('api_token');
            
         
            $user = User::where('api_token', $token)->first();
            
            if ($user) {
        
                Auth::login($user);
                return $next($request);
            }
            
          
            return response()->json(['error' => 'Unauthorized'], 401);
        }


        if (Auth::check()) {
            return $next($request);
        }

        
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
