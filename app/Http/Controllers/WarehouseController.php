<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class WarehouseController extends Controller
{
        public function index(){
            return view('add-warehouse');
        }
        public function viewwarehouse()
        {
            $data = warehouse::get();
            // return $data;
            // return view('view-warehouse');
            return view('view-warehouse', compact('data'));
        }

        public function savewarehouse(Request $request){
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:50',
                'address' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            $warehouse = new warehouse(); // Adjust the model name as needed
            $warehouse->name = $validatedData['name'];
            $warehouse->code = $validatedData['code'];
            $warehouse->address = $validatedData['address'];
            $warehouse->description = $validatedData['description'];
            $warehouse->save();
            return redirect()->back()->with('success', 'Warehouse added successfully');
        }

        public function EditWarehouse($id){
            $data =warehouse::where('id', '=', $id)->first();

            return view('edit-warehouse', compact('data', 'id'));
        }
        // public function edititemsinwarehouse($id){
        //     $data =warehouse::where('id', '=', $id)->first();
        //     // $data = Warehouse::find(10);
        //     dd($data);
        //     return view('edit-items-in-warehouse', compact('data', 'id'));
        // }


        public function EditItems($id){
            $data =warehouse::where('id', '=', $id)->first();

            return view('edit-items', compact('data', 'id'));
        }

        public function updatewarehouse(Request $request){
            // $data = warehouse::get();
            // dd($data);
            $request->validate([
                'id' => 'required|exists:warehouses,id',
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:50',
                'address' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);

            $id = $request->id;

            // Find the warehouse record by ID
            $warehouse = Warehouse::find($id);
            // dd($warehouse);

            if (!$warehouse) {
                return redirect()->back()->with('error', 'Warehouse not found');
            }

            $update_data = [
                'name' => $request->name,
                'code' => $request->code,
                'address' => $request->address,
                'description' => $request->description,
            ];
            $update = DB::table('warehouses')->where('id', $id)->update($update_data);

            if($update){
                return redirect('/view-warehouse')->with('success', 'Warehouse edited successfully');

            }else{
                return redirect()->back()->with('success', 'Warehouse edited failed');

            }


            // dd($update);

        }
        // public function deleteDepartment($id){
        //     warehouse::where('id', '=', $id) ->delete();
        //     return redirect()->back()->with('success', 'warehouse deleted successfully');
        // }
        public function deletewarehouse($id){
            warehouse::where('id', '=', $id) ->delete();
            return redirect()->back()->with('success', 'warehouse deleted successfully');
        }

        public function moveItems(Request $request)
        {
            $validated = $request->validate([
                'item_id' => 'required|exists:items,id',
                'from_warehouse_id' => 'required|exists:warehouses,id',
                'to_warehouse_id' => 'required|exists:warehouses,id',
                'move_date' => 'required|date',
                'move_time' => 'required|date_format:H:i',

            ]);

            $item = items::findOrFail($validated['item_id']);
            $item->warehouse_id = $validated['to_warehouse_id'];
            $item->moved_at = now(); // Save the current date and time
            $item->save();

            $moveDateTime = $validated['move_date'] . ' ' . $validated['move_time'];

            // Save the move date and time if needed in the database

            return redirect()->back()->with('success', 'Item moved successfully at ' . $moveDateTime);
        }

        public function showMoveItemsForm()
        {
            $items = items::all();
            $warehouses = Warehouse::all();

            return view('move-items', compact('items', 'warehouses'));
        }


}
