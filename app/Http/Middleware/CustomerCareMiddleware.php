<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CustomerCareMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            Log::info('User is authenticated');
            Log::info('User role: ' . Auth::user()->role_as);

            // Check if the user has the 'customer care' role
            if (Auth::user()->role_as == 5) { // Assuming role_as 5 is for customer care
                Log::info('User is in Customer Care');
                return $next($request);
            } else {
                Log::info('User is not in Customer Care');
                return redirect('/home')->with('status', 'Access Denied! You are not in Customer Care.');
            }
        } else {
            Log::info('User is not authenticated');
            return redirect('/home')->with('status', 'Please log in first.');
        }
    }
}
