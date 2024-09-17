<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function index()
    {
        // Fetch tasks with assigned users
        $tasks = DB::table('tasks')
            ->leftJoin('users', 'users.id', '=', 'tasks.assigned_user')
            ->select('tasks.*', 'users.name as user_name')
            ->paginate(5);

        return view('view-task', compact('tasks'));
    }





    // public function index()
    // {
    //     $tasks = Task::paginate(10); // Change 10 to your desired pagination limit
    //     return view('view-task', compact('tasks'));
    // }
    public function addtask()
    {
        $users = User::all(); // Fetch all users
        return view('add-task', compact('users'));
    }

    public function saveTask(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:Low,Medium,High',
            'assigned_user' => 'nullable|exists:users,id',
            'assigned_by' => 'required|string|max:255', // Add validation for "Assigned by"
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->priority = $request->priority;
        $task->assigned_user = $request->assigned_user;
        $task->assigned_by = $request->assigned_by; // Save "Assigned by" value
        $task->save();

        return redirect()->back()->with('success', 'Task added successfully');
    }


    public function markTaskAsCompleted(Request $request)
    {
        $taskId = $request->input('task_id');

        $task = Task::find($taskId);
        if ($task) {
            $task->status = 'Completed';
            $task->completed_at = now(); // Set the completion timestamp
            $task->save();

            return redirect()->back()->with('success', 'Task marked as completed successfully.');
        }

        return redirect()->back()->with('error', 'Task not found.');
    }


    public function completed(){
        $tasks =Task::get();

        return view('completed-task', compact('tasks'));
    }



    public function getCompletedTasksData()
    {
        // Fetch daily completed tasks (tasks completed today)
        $dailyCompletedTasks = Task::where('status', 'Completed')
            ->whereDate('completed_at', '=', now()->toDateString())
            ->get();

        // Fetch weekly completed tasks (tasks completed within the current week)
        $weeklyCompletedTasks = Task::where('status', 'Completed')
            ->whereBetween('completed_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->get();

        // Fetch monthly completed tasks (tasks completed within the current month)
        $monthlyCompletedTasks = Task::where('status', 'Completed')
            ->whereMonth('completed_at', now()->month)
            ->get();

        // Format month names for the chart
        $months = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        return response()->json([
            'daily' => $dailyCompletedTasks,
            'weekly' => $weeklyCompletedTasks,
            'monthly' => $monthlyCompletedTasks,
            'months' => $months, // Include the formatted month names in the response
            'today' => now()->format('l'), // Include the name of the day (e.g., Monday)
            'startOfWeek' => now()->startOfWeek()->format('l'), // Include the start of the week (e.g., Sunday)
            'startOfMonth' => now()->startOfMonth()->format('F'), // Include the start of the month (e.g., January)
        ]);
    }








    public function alltaskcompleted()
    {
        $completedTasks = Task::where('status', 'Completed')->get();
        return view('task-completed', ['completedTasks' => $completedTasks]);
    }
    public function Pendingtask()
    {
        // Fetch pending tasks and eagerly load the user relationship
        $pendingTasks = Task::where('status', 'Pending')
            ->with('user') // Eager load the 'user' relationship
            ->get();

        // Pass the data to the view
        return view('pending-task', ['pendingTasks' => $pendingTasks]);
    }



}


