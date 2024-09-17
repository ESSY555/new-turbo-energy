<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Notifications\TransactionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AccountingController extends Controller
{
    public function inbox()
    {
        $user = Auth::user();
        if ($user === null) {
            Log::error('No authenticated user found.');
            return redirect()->route('login')->withErrors('You must be logged in to view this page.');
        }

        $notifications = $user->notifications;

        return view('cashier.inbox', compact('notifications'));
    }


    public function cashier()
    {
        // $transactions = Transaction::all();
        return view('cashier.cashier');
    }

    public function create()
    {
        // Assuming the role of cashier has a role_as value of 1
        $cashiers = User::where('role_as', 1)->get();
        return view('accounting.create', compact('cashiers'));
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'cashier_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'transaction_date' => 'required|date',
        ]);

        try {
            // Create a new transaction
            $transaction = Transaction::create([
                'cashier_id' => $validatedData['cashier_id'],
                'amount' => $validatedData['amount'],
                'description' => $validatedData['description'],
                'transaction_date' => $validatedData['transaction_date'],
            ]);

            // Notify the selected cashier if found
            $cashier = User::find($validatedData['cashier_id']);

            if ($cashier) {
                $cashier->notify(new TransactionNotification($transaction));
            } else {
                // Handle the case where cashier is not found (optional)
                Log::warning('Cashier with ID ' . $validatedData['cashier_id'] . ' not found.');
            }

            return redirect()->route('cashier.inbox')->with('success', 'Transaction created successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions that might occur during transaction creation or notification
            Log::error('Error creating transaction: ' . $e->getMessage());
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
