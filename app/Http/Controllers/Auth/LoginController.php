<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if (Auth::user()->role_as == 1) {
            return redirect('dashboard')->with('status', 'Welcome to your dashboard');
        } elseif (Auth::user()->role_as == 0) {
            return redirect('/')->with('status', 'Logged in successfully');
        } elseif (Auth::user()->role_as == 2) {
            return redirect()->route('accounting-dashboard');
        } elseif (Auth::user()->role_as == 3) {
            return redirect()->route('cashier.transactions');
        } elseif (Auth::user()->role_as == 4) {
            return redirect()->route('bdm.bdmAccount');
        } elseif (Auth::user()->role_as == 5) {  // Marketer role
            return redirect()->route('complaints.index')->with('status', 'Welcome to the Customer Care Dashboard');
        } else {
            return redirect('/home');
        }
    }
    

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
