<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RoleController;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\WarehouseController;
// use App\Http\Controllers\BranchController;
// use App\Http\Controllers\VendorController;

// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect('/');
// })->name('logout');

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// // Route::get('/', function () {
// //     return redirect()->route('admin.login');
// // });

// // Route::middleware(['auth', 'role:admin'])->group(function () {
//     // Route::resource('roles', RoleController::class);
// // });

// // Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/roles', [RoleController::class, 'index'])->name('roles.index');
//     Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('roles.create');
//     Route::post('/admin/roles/store', [RoleController::class, 'store'])->name('roles.store');
//     Route::get('/admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
//     Route::post('/admin/roles/{role}/update', [RoleController::class, 'update'])->name('roles.update');
//     Route::delete('/admin/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
// // });

// // Route::middleware(['auth'])->group(function () {
//     Route::resource('warehouses', WarehouseController::class);
//     Route::resource('branches', BranchController::class);
//     Route::resource('vendors', VendorController::class);
// // });

// use App\Http\Controllers\AdminController;

// // Admin Login Routes
// Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
// Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// // Admin Dashboard (Protected)
// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

// use App\Http\Controllers\AuthController;

// // Show login form
// Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// // Handle login
// Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// // Logout route
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// // Dashboard routes based on user role
// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
//     Route::get('/company/dashboard', [AuthController::class, 'companyDashboard'])->name('company.dashboard');
//     Route::get('/branch/dashboard', [AuthController::class, 'branchDashboard'])->name('branch.dashboard');
//     Route::get('/vendor/dashboard', [AuthController::class, 'vendorDashboard'])->name('vendor.dashboard');
//     Route::get('/warehouse/dashboard', [AuthController::class, 'warehouseDashboard'])->name('warehouse.dashboard');
// });


// ===

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\VendorController;

// ===============================
// AUTHENTICATION ROUTES
// ===============================

// Show Login Form
// Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// // Handle User Login
// Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// // Handle Logout
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// // ===============================
// // ADMIN LOGIN & DASHBOARD
// // ===============================

// // Admin Login Routes
// Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
// Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// // Admin Dashboard (Protected)
// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

// // ===============================
// // DASHBOARDS FOR DIFFERENT USER ROLES
// // ===============================

// Route::middleware(['auth'])->group(function () {
//     Route::get('/company/dashboard', [AuthController::class, 'companyDashboard'])->name('company.dashboard');
//     Route::get('/branch/dashboard', [AuthController::class, 'branchDashboard'])->name('branch.dashboard');
//     Route::get('/vendor/dashboard', [AuthController::class, 'vendorDashboard'])->name('vendor.dashboard');
//     Route::get('/warehouse/dashboard', [AuthController::class, 'warehouseDashboard'])->name('warehouse.dashboard');
// });

// // ===============================
// // ROLE MANAGEMENT ROUTES (Admin Only)
// // ===============================

// Route::middleware(['auth'])->group(function () {
//     Route::prefix('admin')->group(function () {
//         Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
//         Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
//         Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
//         Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
//         Route::post('/roles/{role}/update', [RoleController::class, 'update'])->name('roles.update');
//         Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
//     });
// });

// // ===============================
// // RESOURCE ROUTES (WAREHOUSES, BRANCHES, VENDORS)
// // ===============================

// Route::middleware(['auth'])->group(function () {
//     Route::resource('warehouses', WarehouseController::class);
//     Route::resource('branches', BranchController::class);
//     Route::resource('vendors', VendorController::class);
// });

// =============
// Show login form
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/company/dashboard', [AuthController::class, 'companyDashboard'])->name('company.dashboard');
    Route::get('/branch/dashboard', [AuthController::class, 'branchDashboard'])->name('branch.dashboard');
    Route::get('/vendor/dashboard', [AuthController::class, 'vendorDashboard'])->name('vendor.dashboard');
    Route::get('/warehouse/dashboard', [AuthController::class, 'warehouseDashboard'])->name('warehouse.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('/roles/{role}/update', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
});
