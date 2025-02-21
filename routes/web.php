<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\KasirTransactionController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\KasirReportController;
use App\Http\Controllers\OwnerReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\KasirCustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 🌍 Public Routes (Authentication)
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return view('welcome'); });

// 🚀 User Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🚀 User Registration
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| 🛍 Customer Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/customer/register', [CustomerAuthController::class, 'showRegister'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'register']);
Route::get('/customer/login', [CustomerAuthController::class, 'showLogin'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'login']);
Route::post('/customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

/*
|--------------------------------------------------------------------------
| 🏠 Customer Dashboard (Protected Routes)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:customer')->group(function () {
    Route::get('/customer/dashboard', function () { return view('customer.dashboard'); })->name('customer.dashboard');
    Route::get('/customer/orders', function () { return view('customer.orders'); })->name('customer.orders');
    Route::get('/customer/profile', function () { return view('customer.profile'); })->name('customer.profile');
});

/*
|--------------------------------------------------------------------------
| 🔥 Admin & Kasir Can Manage Customers
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::resource('/kasir/customers', KasirCustomerController::class)->names('kasir.customers');
});

/*
|--------------------------------------------------------------------------
| 🏠 Dashboard for Authenticated Users
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| 🔥 Admin Routes (Full Access)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/outlets', OutletController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/admin/transactions', AdminTransactionController::class)->names('admin.transactions');
    Route::resource('/admin/customers', AdminCustomerController::class)->names('admin.customers');
    Route::resource('/admin/reports', AdminReportController::class)->only(['index'])->names('admin.reports');
    Route::post('/admin/reports/generate', [AdminReportController::class, 'generate'])->name('admin.reports.generate');
});

/*
|--------------------------------------------------------------------------
| 🔥 Kasir Routes (Limited Access)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::resource('/kasir/transactions', KasirTransactionController::class)->names('kasir.transactions');
    Route::resource('/kasir/customers', KasirCustomerController::class)->names('kasir.customers');
    Route::resource('/kasir/reports', KasirReportController::class)->only(['index'])->names('kasir.reports');
    Route::post('/kasir/reports/generate', [KasirReportController::class, 'generate'])->name('kasir.reports.generate');
});

/*
|--------------------------------------------------------------------------
| 🔥 Owner Routes (Only Reports)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::resource('/owner/reports', OwnerReportController::class)->only(['index'])->names('owner.reports');
    Route::post('/owner/reports/generate', [OwnerReportController::class, 'generate'])->name('owner.reports.generate');
});
