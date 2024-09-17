<?php

namespace App\Http\Controllers;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departmentcontroller extends Controller
{
    public function deleteDepartment($id){
        department::where('id', '=', $id) ->delete();
        dd($id);
        return redirect()->back()->with('success', 'Department deleted successfully');
    }
    public function department(){
        return view('add-department');
    }
    public function editDepartment($id){
        $data =department::where('id', '=', $id)->first();
        // $data = Warehouse::find(10);
        // dd($data);
        return view('edit-department', compact('data', 'id'));
    }

    public function insert(Request $request){
        // Validate the request data
        $validatedData = $request->validate([
            'department' => 'required|string', // Update the key to 'department'
        ]);

        // Insert the department data into the database
        $department = $validatedData['department'];
        DB::insert("insert into department(department) values(?)", [$department]);

        // Optionally, you can redirect back with a success message
        return redirect()->back()->with('success', 'Department added successfully');
    }
}