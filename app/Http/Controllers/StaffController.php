<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function newAccordion(){
        return view('new-accordion');
    }
    public function newAccor(){
        return view('add-warehouse');
    }
    public function people(){
        return ('this is greate');
    }
    public function index()
    {
        $data = Staff::paginate(5);
        return view('view-staff', compact('data'));
    }


    public function addStaff()
    {
        return view('add-staff');
    }

    public function saveStaff(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'firstName' => 'required',
                'middleName' => 'nullable',
                'lastName' => 'required',
                'address' => 'required',
               'phoneNumber' => [
                'required',
                'digits:11', // Ensures exactly 11 digits
                'regex:/^0\d{10}$/i', // Validates the format with leading 0 and 10 digits after it
            ],
                'email' => 'required|email|regex:/^.+@.+\.com$/i',
                'department' => 'required',
            ]);

            $staff = new Staff();
            $staff->firstName = $validatedData['firstName'];
            $staff->middleName = $validatedData['middleName'];
            $staff->lastName = $validatedData['lastName'];
            $staff->address = $validatedData['address'];
            $staff->phoneNumber = $validatedData['phoneNumber'];
            $staff->email = $validatedData['email'];
            $staff->department = $validatedData['department'];

            $staff->save();

            return redirect()->back()->with('success', 'Staff added successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) { // 1062 is MySQL error code for duplicate entry
                return redirect()->back()->with('error', 'Email already exists. Please use a different email.');
            } else {
                // Handle other database errors
                return redirect()->back()->with('error', 'An error occurred while saving the staff member.');
            }
        }
    }

    public function EditStaff($id){
        $data =staff::where('id', '=', $id)->first();
        return view('edit-staff', compact('data'));
    }
    public function updateStaff(Request $request)
{
    try {
        // Validate the request data
        $request->validate([
            'firstName' => 'required|string|max:255',
            'middleName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:15',
            'Email' => 'required|email|max:255|unique:staff,Email,'.$request->id.',id',
            'department' => 'required|string|max:255',
        ]);

        // Retrieve the staff ID from the request
        $id = $request->id;

        // Find the staff record by ID
        $staff = Staff::find($id);

        if (!$staff) {
            throw new \Exception("Staff record not found with ID: $id");
        }

        // Update the staff record with the new data
        $staff->FirstName = $request->firstName;
        $staff->MiddleName = $request->middleName;
        $staff->LastName = $request->lastName;
        $staff->Address = $request->address;
        $staff->PhoneNumber = $request->phoneNumber;
        $staff->Email = $request->Email;
        $staff->Department = $request->department;

        // Save the updated staff record
        $updateResult = $staff->save();

        if ($updateResult) {
            return redirect('/view-staff')->with('success', 'Staff edited successfully');
        } else {
            throw new \Exception("Failed to update staff record with ID: $id");
        }
    } catch (\Exception $e) {
        // Log the exception (error) for debugging
        Log::error('Update Error:', ['message' => $e->getMessage()]);

        // Redirect back with an error message
        return redirect()->back()->with('error', 'Failed to update staff. Please try again.');
    }
}




    public function deleteDepartment($id){
        Staff::where('id', '=', $id) ->delete();
        return redirect()->back()->with('success', 'Staff deleted successfully');
    }
    public function deletestaff($id){
        Staff::where('id', '=', $id) ->delete();
        return redirect()->back()->with('success', 'Staff deleted successfully');
    }

    }
