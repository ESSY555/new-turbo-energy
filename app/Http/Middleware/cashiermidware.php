<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class cashiermidware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            Log::info('User is authenticated');
            Log::info('User role: ' . Auth::user()->role_as);

            if (Auth::user()->role_as == '3' . Auth::user()->role_as) {
                Log::info('User is a cashier');
                return $next($request);
            } else {
                Log::info('User is not a cashier');
                return redirect('/home')->with('status', 'Access Denied! You are not a cashier.');
            }
        } else {
            Log::info('User is not authenticated');
            return redirect('/home')->with('status', 'Please log in first.');
        }
    }
}
