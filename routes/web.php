<?php

use App\Http\Controllers\levelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//Employee
Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'employee'], function () {
    Route::get('/dashboard', function () {
        return view('employee/employeeDashboard', ['judul' => "Employee", 'subJudul' => "Dashboard"]);
        //return $employee;
    })->name('employeeDashboard');
});
//End Employee
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
//end level
// , 'role:SuperAdm'



require __DIR__ . '/auth.php';
