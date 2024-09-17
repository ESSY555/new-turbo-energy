<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Accountantmiddleware
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

            if (Auth::user()->role_as == '2') {
                Log::info('User is an accountant');
                return $next($request);
            } else {
                Log::info('User is not an accountant');
                return redirect('/home')->with('status', 'Access Denied! You are not an accountant.');
            }
        } else {
            Log::info('User is not authenticated');
            return redirect('/home')->with('status', 'Please log in first.');
        }
    }


}
