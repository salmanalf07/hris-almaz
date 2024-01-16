<?php

use App\Http\Controllers\departmentController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\levelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\typeEmployeeController;
use App\Http\Controllers\userController;
use App\Models\department;
use App\Models\level;
use App\Models\typeEmployee;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|`
*/

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//API
Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'api'], function () {
    Route::get('/bankIndonesia', function () {
        $path = public_path('assets/json/indonesia-bank.json');
        $data = json_decode(File::get($path), true);

        return response()->json($data);
    })->name('apiBankIndonesia');
});
//END API
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//level
Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'level'], function () {
    Route::get('/dashboard', function () {
        return view('masterData/level/levelDashboard', ['judul' => "Level", 'subJudul' => "Dashboard"]);
        //return $employee;
    })->name('levelDashboard');
    Route::get('/json', [levelController::class, 'json'])->name('dataTableLevel');
    Route::post('/store', [levelController::class, 'store'])->name('storeLevel');
    Route::post('/edit', [levelController::class, 'edit'])->name('editLevel');
    Route::post('/update', [levelController::class, 'update'])->name('updateLevel');
    Route::delete('/delete', [levelController::class, 'delete'])->name('deleteLevel');
});
//End level
//User
Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:SuperAdmin'], 'prefix' => 'user'], function () {
    Route::get('/dashboard', function () {
        $role = Role::all();
        return view('masterData/user/userDashboard', ['judul' => "User", 'subJudul' => "Dashboard", 'role' => $role]);
        //return $employee;
    })->name('userDashboard');
    Route::get('/json', [userController::class, 'json'])->name('dataTableUser');
    Route::post('/store', [userController::class, 'store'])->name('storeUser');
    Route::post('/edit', [userController::class, 'edit'])->name('editUser');
    Route::post('/update', [userController::class, 'update'])->name('updateUser');
    Route::delete('/delete', [userController::class, 'delete'])->name('deleteUser');
});
//End User
//Department
Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:SuperAdmin'], 'prefix' => 'department'], function () {
    Route::get('/dashboard', function () {
        return view('masterData/department/departmentDashboard', ['judul' => "Department", 'subJudul' => "Dashboard"]);
        //return $employee;
    })->name('departmentDashboard');
    Route::get('/json', [departmentController::class, 'json'])->name('dataTableDepartment');
    Route::post('/store', [departmentController::class, 'store'])->name('storeDepartment');
    Route::post('/edit', [departmentController::class, 'edit'])->name('editDepartment');
    Route::post('/update', [departmentController::class, 'update'])->name('updateDepartment');
    Route::delete('/delete', [departmentController::class, 'delete'])->name('deleteDepartment');
});
//End Department
//typeEmployee
Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:SuperAdmin'], 'prefix' => 'typeEmployee'], function () {
    Route::get('/dashboard', function () {
        return view('masterData/typeEmployee/typeEmployeeDashboard', ['judul' => "Type Employee", 'subJudul' => "Dashboard"]);
        //return $employee;
    })->name('typeEmployeeDashboard');
    Route::get('/json', [typeEmployeeController::class, 'json'])->name('dataTableTypeEmployee');
    Route::post('/store', [typeEmployeeController::class, 'store'])->name('storeTypeEmployee');
    Route::post('/edit', [typeEmployeeController::class, 'edit'])->name('editTypeEmployee');
    Route::post('/update', [typeEmployeeController::class, 'update'])->name('updateTypeEmployee');
    Route::delete('/delete', [typeEmployeeController::class, 'delete'])->name('deleteTypeEmployee');
});
//End typeEmployee
//Employee
Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:SuperAdmin'], 'prefix' => 'employee'], function () {
    Route::get('/dashboard', function () {
        return view('employee/employeeDashboard', ['judul' => "Employee", 'subJudul' => "Dashboard"]);
        //return $employee;
    })->name('employeeDashboard');
    Route::get('/add', function () {
        $typeEmployee = typeEmployee::get();
        $level = level::get();
        $department = department::get();
        $role = Role::all();
        return view('employee/editorEmployee', ['judul' => "Employee", 'subJudul' => "Add", 'typeEmployee' => $typeEmployee, 'level' => $level, 'department' => $department, 'role' => $role]);
        //return $employee;
    })->name('addEmployee');
    Route::get('/json', [employeeController::class, 'json'])->name('dataTableEmployee');
    Route::post('/store', [employeeController::class, 'store'])->name('storeEmployee');
    Route::get('/edit/{id}', [employeeController::class, 'edit'])->name('editEmployee');
    Route::post('/update', [employeeController::class, 'update'])->name('updateEmployee');
    Route::delete('/delete', [employeeController::class, 'delete'])->name('deleteEmployee');
});
//End Employee



require __DIR__ . '/auth.php';
