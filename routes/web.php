<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route bakal login (guest cuma bisa di akses kalo ga login)
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Route logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Routes Admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // 1. Dashboard dengan Statistik
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // 2. Fitur Laundry (Transaksi) - Menggunakan logic yang sama dengan Operator
    Route::get('/laundry', [App\Http\Controllers\TransactionController::class, 'create'])->name('laundry.create');
    Route::post('/laundry', [App\Http\Controllers\TransactionController::class, 'store'])->name('laundry.store');

    // 3. Kelola Data Customer (CRUD)
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    
    // Kelola User & Service (Tetap ada dari sebelumnya)
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('services', App\Http\Controllers\ServiceController::class);
});


