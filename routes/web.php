<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityLogController;

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

// ── Landing Page ───────────────────────────────────────────────────────

Route::get('/landing', function () {
    return view('landing');
})->name('landing');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/logout', function () {
    return redirect()->route('login');
})->name('logout');

// ── Existing practice routes (unchanged) ──────────────────────────────

Route::get('/old', function () {
    return view('pages.index');
})->name('home');

Route::get('/image', function () {
    return view('pages.image');
})->name('image');

Route::get('/form', function () {
    return view('pages.form');
})->name('form');

Route::post('/form', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:80'],
        'email' => ['required', 'email'],
        'message' => ['required', 'string', 'max:500'],
    ]);

    return redirect()->route('form')->with('success', 'Thanks, '.$validated['name'].'. Your example form was submitted.');
})->middleware('capital.name')->name('form.submit');

Route::get('/table', function () {
    $people = [
        ['name' => 'Amina Yusuf', 'role' => 'Designer', 'status' => 'Active'],
        ['name' => 'Leo Martin', 'role' => 'Developer', 'status' => 'Learning'],
        ['name' => 'Sofia Chen', 'role' => 'Student', 'status' => 'Active'],
    ];

    return view('pages.table', ['people' => $people]);
})->name('table');

// ── Student Record Management System Routes ───────────────────────────

// Landing page (home page)
Route::get('/', function () {
    return redirect()->route('landing');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// User Profile
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::patch('/profile/{id}', [UserController::class, 'update'])->name('profile.update');

// User Management (Admin only)
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit-role', [UserController::class, 'editRole'])->name('users.edit_role');
Route::patch('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.update_role');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Activity Logs (Admin only)
Route::get('/activity-logs', [ActivityLogController::class, 'index'])->name('activity_logs.index');
Route::get('/activity-logs/{id}', [ActivityLogController::class, 'show'])->name('activity_logs.show');
Route::delete('/activity-logs/{id}', [ActivityLogController::class, 'destroy'])->name('activity_logs.destroy');
Route::delete('/activity-logs/clear', [ActivityLogController::class, 'clearLogs'])->name('activity_logs.clear');

// Student CRUD (resource routes)
Route::resource('students', StudentController::class);

// Trashed students (soft deletes)
Route::get('/students-trashed', [StudentController::class, 'trashed'])->name('students.trashed');
Route::patch('/students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');
Route::delete('/students/{id}/force-delete', [StudentController::class, 'forceDelete'])->name('students.forceDelete');

// Course CRUD (resource routes)
Route::resource('courses', CourseController::class);

// ── Stock Management System Routes ───────────────────────────────────────

// Category CRUD
Route::resource('categories', CategoryController::class);

// Supplier CRUD
Route::resource('suppliers', SupplierController::class);

// Warehouse CRUD
Route::resource('warehouses', WarehouseController::class);

// Product CRUD
Route::resource('products', ProductController::class);

// Stock CRUD
Route::resource('stocks', StockController::class);

// Purchase Order CRUD
Route::resource('purchase_orders', PurchaseOrderController::class);

