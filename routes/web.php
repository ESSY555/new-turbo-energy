<?php

use App\Http\Controllers\AccountingController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\departmentcontroller;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FundingRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\itemsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Models\Task; // Assuming Task is your model for tasks
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'customer_care'])->group(function () {
    Route::get('/customer-care-dashboard', [ComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/unresolved-cases', [ComplaintController::class, 'unresolvedCases'])->name('complaints.unresolvedCases');
    // Add other routes that require customer care access here
});

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home'); 

// Accounting routes
Route::middleware(['auth', 'isAccountant'])->group(function () {
    Route::get('/accounting-dashboard', [AccountingController::class, 'create'])->name('accounting-dashboard');
});

// Cashier routes
Route::middleware(['auth', 'isCashier'])->group(function () {
    Route::get('/cashier/transactions', [CashierController::class, 'transactions'])->name('cashier.transactions');
});

// Admin routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });


});

    // Other authenticated routes go here
Route::resource('funding_requests', FundingRequestController::class)->middleware(['auth']);

Route::get('/view-staff', [StaffController::class, 'index']);
Route::get('/add-staff', [StaffController::class, 'addStaff']);
Route::post('/save-staff', [StaffController::class, 'saveStaff']);
Route::delete('/delete-staff/{id}', [StaffController::class, 'deletestaff']);
Route::get('/edit-staff/{id}', [StaffController::class, 'editStaff']);
Route::post('/update-staff', [StaffController::class, 'updateStaff']);
Route::get('/edit-items/{id}', [itemsController::class, 'EditItems']);
Route::post('/update-items', [itemsController::class, 'updateitems']);
Route::post('/save-warehouse', [WarehouseController::class, 'savewarehouse']);
Route::get('/add-warehouse', [WarehouseController::class, 'index']);
Route::get('/view-warehouse', [WarehouseController::class, 'viewwarehouse']);
Route::get('/edit-warehouse/{id}', [WarehouseController::class, 'EditWarehouse']);
Route::post('/update-warehouse', [WarehouseController::class, 'updatewarehouse']);
Route::get('/add-items', [itemsController::class, 'index']);
Route::get('/view-items', [itemsController::class, 'viewitems']);
Route::get('/view-items-in-warehouse/{id}', [itemsController::class, 'itemsInWarehouse']);
Route::get('/view/department', [departmentcontroller::class, 'department'])->name('department');
Route::get('/view-dep', [itemsController::class, 'viewDepartments']);
Route::post('/save-items', [itemsController::class, 'saveitems']);
Route::post('/insert-department', [departmentcontroller::class, 'insert']);
Route::get('/view-department', [itemsController::class, 'viewDepartments']);
Route::get('/edit-department/{id}', [departmentcontroller::class, 'editDepartment']);
Route::get('/delete-department/{id}', [departmentcontroller::class, 'deleteDepartment']);
Route::get('/delete-items/{id}', [itemsController::class, 'deleteItems']);
Route::get('/delete-warehouse/{id}', [WarehouseController::class, 'deletewarehouse']);
Route::get('/edit-items-in-warehouse/{id}', [itemsController::class, 'edititemsinwarehouse']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/save-task', [TaskController::class, 'saveTask']);
Route::get('/view-task', [TaskController::class, 'index']);
Route::get('/add-task', [TaskController::class, 'addtask']);
Route::post('/tasks-complete', [TaskController::class, 'markTaskAsCompleted'])->name('tasks-complete');
Route::get('/completed-task', [TaskController::class, 'completed']);
Route::get('/all-task-completed', [TaskController::class, 'alltaskcompleted']);
Route::get('/pending-task', [TaskController::class, 'Pendingtask']);
Route::get('/completed-tasks/data', [TaskController::class, ('getCompletedTasksData')])->name('completed-tasks.data');
Route::post('/save-user', [UserController::class, 'saveUser'])->name('save-user');
Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('delete-user');
Route::post('/make-admin/{id}', [UserController::class, 'makeAdmin'])->name('make-admin');
Route::get('/user-add', [UserController::class, 'useradd']);
Route::get('/view-users', [UserController::class, 'viewUsers']);
Route::put('/users/{id}/deactivate', [UserController::class, 'deactivateUser'])->name('deactivate-user');
Route::put('/reactivate-user/{id}', [UserController::class, 'reactivateUser'])->name('reactivate-user');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/warehouses/move-items', [WarehouseController::class, 'showMoveItemsForm'])->name('warehouses.move-items-form');
Route::post('/warehouses/move-items', [WarehouseController::class, 'moveItems'])->name('warehouses.move-items');
Route::post('/form1-submit', [FormController::class, 'submitForm1'])->name('form1.submit');

Route::get('/accounting', [AccountingController::class, 'index'])->name('accounting.index');
Route::post('/user/{id}/change-role', [UserController::class, 'changeRole'])->name('user.change-role');
Route::get('/users', [UserController::class, 'viewUsers'])->name('user-list');
// routes/web.php
Route::get('/accounting/create', [App\Http\Controllers\AccountingController::class, 'create'])->name('accounting.create');
Route::post('/accounting/store', [App\Http\Controllers\AccountingController::class, 'store'])->name('accounting.store');
Route::get('/cashier/inbox', [App\Http\Controllers\AccountingController::class, 'inbox'])->name('cashier.inbox');


// Route to show the complaint form
Route::get('/complaint-form', [ComplaintController::class, 'create'])->name('complaints.create');

// Route to handle form submission
Route::post('/complaint-form', [ComplaintController::class, 'store'])->name('complaints.store');

// Route to view complaints in the customer care dashboard
// Route::get('/customer-care-dashboard', [ComplaintController::class, 'index'])->name('complaints.index');

// Route to view completed tasks for the user
Route::get('/completed-tasks', [ComplaintController::class, 'completedTasks'])->name('complaints.completedTasks');

// Route to update the status of a complaint
Route::post('/complaint/{id}/status', [ComplaintController::class, 'updateStatus'])->name('complaints.updateStatus');

// Route::get('/unresolved-cases', [ComplaintController::class, 'unresolvedCases'])->name('complaints.unresolvedCases');

// Route to forward a complaint to another user
Route::post('/complaint/{id}/forward', [ComplaintController::class, 'forward'])->name('complaints.forward');

Auth::routes();





// public function deletStudent($id){
//     Student::where('id', '=', $id)->delete();
//     return redirect()->back()->with('success','Staff deleted successfully');
//     }
// <a href="{{url('delet-Student/'.$stu->id)}}" class="btn btn-danger" style="float: right;">Delete</a>
// Route::get('/delet-Student/{id}', [StudentController::class, 'deletStudent']);
