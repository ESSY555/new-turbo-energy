<?php

namespace App\Http\Controllers;
use App\Models\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator; // Import Validator facade


class itemsController extends Controller
{
    public function index(){
        //  $data = items::get();
        // return $data;
        return view('add-Items');
    }
    public function itemsInWarehouse($id){
        $items = DB::table('items')->where('warehouse_id', $id)->get();
        return view('view-items-in-warehouse', compact('items'));
    }

    public function viewitems()
    {
        $data = DB::table('items')
            ->join('warehouses', 'warehouses.id', 'items.warehouse_id')
            ->select('items.*', 'warehouses.*', 'warehouses.name as warehouse_name',
                'warehouses.code as warehouses_code', 'items.name as item_name',
                'items.code as item_code', 'warehouses.address as warehouses_address',
                'items.address as item_address',
                'warehouses.description as warehouse_description',
                'items.description as item_description', 'items.units as item_units',
                'items.id as item_id')
            ->paginate(5);

        return view('view-items', compact('data'));
    }

    public function saveitems(Request $request)
    {

        $validatedData = $request->validate([
            'warehouse_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:255', // Adjust max length if needed
            'units' => 'required|string|max:255', // Adjust max length if needed
        ]);
        $data = [
            'warehouse_id' => $validatedData['warehouse_id'],
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'address' => $validatedData['address'],
            'description' => $validatedData['description'],// Adjust max length if needed
            'units' => $validatedData['units'] // Adjust max length if needed
        ];
            $save_items = DB::table('items')->insert($data);

             if (!$save_items) {
                return redirect()->back()->with('error', 'items not found');
            }
        return redirect()->back()->with('success', 'Items added successfully');
    }
    // public function department(){
    //     return view('department');
    // }
    // public function insert(Request $request){
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'department' => 'required|string', // Update the key to 'department'
    //     ]);

    //     // Insert the department data into the database
    //     $department = $validatedData['department'];
    //     DB::insert("insert into department(department) values(?)", [$department]);

    //     // Optionally, you can redirect back with a success message
    //     return redirect()->back()->with('success', 'Department added successfully');
    // }
    public function viewDepartments()
{

    return view('view-department');
}
    public function editDepartment()
{

    return view('edit-department');
}

public function EditItems($id){
    $data =DB::table('items')->where('id', $id)->first();
    // dd($data);
    // // dd($data);

    return view('edit-items', compact('data', 'id'));
}

public function deleteItems($id){
    items::where('id', '=', $id) ->delete();
    return redirect()->back()->with('success', 'Items deleted successfully');
}
public function deleteDepartment($id){
    items::where('id', '=', $id) ->delete();
    return redirect()->back()->with('success', 'Department deleted successfully');
}


public function edititemsinwarehouse($id){
    $data =items::where('id', '=', $id)->first();
    // $data = Warehouse::find(10);
    // dd($data);
    return view('edit-items-in-warehouse', compact('data', 'id'));
}

public function updateitems(Request $request){
    $request->validate([
        'id' => 'required|integer', // Assuming ID is passed in the request
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:50',
        'address' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'units' => 'required|string|max:255',
    ]);

    $id = $request->id;

    $items = items::find($id);

    if (!$items) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $update_data = [
        'name' => $request->name,
        'code' => $request->code,
        'address' => $request->address,
        'description' => $request->description,
        'units' => $request->units,
    ];

    $update = DB::table('items')->where('id', $id)->update($update_data);

    if($update){
        return redirect('/view-items')->with('success', 'Item edited successfully');
    }else{
        return redirect()->back()->with('error', 'Item edit failed');
    }
}

}








