<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//----------------------------------Job----------------------------//
Route::get('/job', [JobController::class, 'index'])->name('job.index');
Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
Route::post('/job', [JobController::class, 'store'])->name('job.store');
Route::get('job/{job}/edit',[JobController::class, 'edit'])->name('job.edit');
Route::put('job/{job}', [JobController::class, 'update'])->name('job.update');
Route::delete('job/{job}',[JobController::class,'destroy'])->name('job.destroy');


//----------------------------------Employer----------------------------//
Route::get('employer/index', [EmployerController::class, 'index'])->name('employer.index');
Route::get('employer/create', [EmployerController::class, 'create'])->name('employer.create');
Route::post('employer/', [EmployerController::class,'store'])->name('employer.store');
Route::get('employer/{employer}/edit', [EmployerController::class, 'edit'])->name('employer.edit');
Route::put('employer/{employer}', [EmployerController::class, 'update'])->name('employer.update');
Route::get('employer/show/{id}', [EmployerController::class, 'show'])->name('employer.show');
Route::delete('employer/{employer}', [EmployerController::class, 'destroy'])->name('employer.destroy');


//----------------------------------Employee----------------------------//
Route::get('employee/index', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('employee/create',[EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee/',[EmployeeController::class, 'store'])->name('employee.store');
Route::get('employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('employee/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
Route::get('employee/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::delete('employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

//----------------------------------Roles-------------------------------//
Route::group(['middleware' => ['auth']], function() {
    Route::get('roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create',[RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/',[RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{roles}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{roles}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('roles/show/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::delete('roles/{roles}', [RoleController::class, 'destroy'])->name('roles.destroy');
});

//----------------------------------Users-------------------------------//
Route::group(['middleware' => ['auth']], function() {
    Route::get('users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create',[UserController::class, 'create'])->name('users.create');
    Route::post('users/',[UserController::class, 'store'])->name('users.store');
    Route::get('users/{users}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{users}', [UserController::class, 'update'])->name('users.update');
    Route::get('users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('users/{users}', [UserController::class, 'destroy'])->name('users.destroy');
});


require __DIR__.'/auth.php';
