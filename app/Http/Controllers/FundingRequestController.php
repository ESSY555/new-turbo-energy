<?php

namespace App\Http\Controllers;

use App\Models\FundingRequest;
use App\Models\User;
use App\Notifications\FundingRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class FundingRequestController extends Controller
{
    public function create()
    {
        return view('funding_requests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'location' => 'required|string|max:255',
            'reason' => 'required|string',
            'initial_funding' => 'required|numeric', 
            'current_balance' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $fundingRequest = new FundingRequest($request->all());
        $fundingRequest->user_id = auth()->id();
        $fundingRequest->save();

        // Notify accountant and BDM
        Notification::send(User::whereIn('role_as', [2, 3,4])->get(), new FundingRequestNotification($fundingRequest));

        return redirect()->route('funding_requests.index')->with('success', 'Funding request created successfully.');
    }

    public function index()
    {
        $fundingRequests = FundingRequest::with('user')->get();

        return view('funding_requests.create', compact('fundingRequests'));
    }
    public function inbox()
    {
        $notifications = Auth::user()->notifications;

        return view('cashier.inbox', compact('notifications'));
    }
}
