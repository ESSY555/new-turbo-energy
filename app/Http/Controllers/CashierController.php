<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{
    public function transactions()
    {
        $cashier = Auth::user();
        $transactions = Transaction::where('cashier_id', $cashier->id)->orderBy('created_at', 'desc')->get();
        return view('cashier.transactions', compact('transactions'));
    }
}
