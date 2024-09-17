<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    // Show the complaint form
    public function create()
    {
        return view('complaint.complaint_form');
    }

    // Store a new complaint
    public function store(Request $request)
    {
        $complaint = new Complaint();
        $complaint->name = $request->name;
        $complaint->phone = $request->phone;
        $complaint->location = $request->location;
        $complaint->spn = $request->spn;
        $complaint->email = $request->email;
        $complaint->date_of_complaint = $request->date_of_complaint;
        $complaint->complaint = $request->complaint;
        $complaint->status = 'pending';
        $complaint->save();

        return redirect()->back()->with('success', 'Complaint submitted successfully.');
    }

    // Update the status of a complaint
    public function updateStatus(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->status = $request->status;
        if ($request->status === 'resolved') {
            $complaint->resolved_by = auth()->id();
        }
        $complaint->save();

        return redirect()->back()->with('success', 'Complaint status updated successfully.');
    }

    // Show complaints in customer care dashboard
    public function index()
    {
        $complaints = Complaint::where('status', '!=', 'resolved')->get();
        $users = User::all(); // Fetch users for forwarding
        return view('complaint.customer_care_dashboard', compact('complaints', 'users'));
    }

    // public function index()
    // {
    //     $complaints = Complaint::where('status', '!=', 'resolved')->get();
    //     return view('conplaint.customer_care_dashboard', compact('complaints'));
    // }

    // Show completed tasks for the user
    public function completedTasks()
    {
        $complaints = Complaint::where('resolved_by', auth()->id())->get();
        return view('complaint.user_completed_tasks', compact('complaints'));
    }

    // Show unresolved cases
    public function unresolvedCases()
    {
        $complaints = Complaint::where('status', 'pending')->orWhere('status', 'unresolved')->get();
        return view('complaint.unresolved_cases', compact('complaints'));
    }

    // Forward a complaint to another user
    public function forward(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->forwarded_to = $request->user_id;
        $complaint->status = 'pending'; // Optionally set status to pending when forwarded
        $complaint->save();

        return redirect()->back()->with('success', 'Complaint forwarded successfully.');
    }
}
