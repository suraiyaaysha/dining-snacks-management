<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LunchController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\ManpowerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenuAssignmentController;

// Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard route
Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

// Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Manpower Routes
    Route::resource('manpower', ManpowerController::class);

    // Snacks Routes
    Route::resource('snacks', SnackController::class);

    // Lunch Routes
    Route::resource('lunch', LunchController::class);
});

// Menu Assignment Routes
Route::get('admin.menu-assignment', [MenuAssignmentController::class, 'index'])->name('admin.menu-assignment.index')->middleware(['auth']);
Route::post('admin.menu-assignment', [MenuAssignmentController::class, 'store'])->name('admin.menu-assignment.store')->middleware(['auth']);
