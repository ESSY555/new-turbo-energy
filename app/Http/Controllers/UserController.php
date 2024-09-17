<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
class UserController extends Controller
{
    public function saveUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:0,1,2,3,4',
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_as = $request->role;
            $user->save();

            return redirect()->back()->with('success', 'User added successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully');
        }

        return redirect()->back()->with('error', 'User not found');
    }

    public function changeRole(Request $request, $id)
    {
        $request->validate([
            'role_as' => 'required|integer|in:0,1,2,3,4',
        ]);

        $user = User::findOrFail($id);
        $user->role_as = $request->input('role_as');
        $user->save();

        return redirect()->back()->with('success', 'User role updated successfully');
    }

    public function userAdd()
    {
        $users = User::all();
        return view('user-add', compact('users'));
    }

    public function viewUsers()
    {
        $users = User::paginate(5);
        return view('user-list', compact('users'));
    }

    public function deactivateUser($id)
    {
        $user = User::findOrFail($id);
        $user->active = false;
        $user->save();

        return redirect()->back()->with('success', 'User deactivated successfully');
    }

    public function reactivateUser($id)
    {
        $user = User::findOrFail($id);
        $user->active = true;
        $user->save();

        return redirect()->back()->with('success', 'User reactivated successfully');
    }
}
