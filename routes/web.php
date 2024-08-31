<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LunchController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\ManpowerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PredictionController;
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
    Route::get('manpower-quantities', [ManpowerController::class, 'showManpowerQuantities'])->name('manpower.quantities');

    // Snacks Routes
    Route::resource('snacks', SnackController::class);

    // Lunch Routes
    Route::resource('lunch', LunchController::class);
});

// Route::get('admin/manpower-quantities', [ManpowerController::class, 'showManpowerQuantities'])->name('admin.manpower.quantities')->middleware(['auth']);

// Menu Assignment Routes
Route::middleware(['auth'])->group(function () {
    Route::get('admin/menu-assignments', [MenuAssignmentController::class, 'index'])->name('admin.menu-assignment.index');
    Route::get('admin/menu-assignments/create', [MenuAssignmentController::class, 'create'])->name('admin.menu-assignment.create');
    Route::post('admin/menu-assignments', [MenuAssignmentController::class, 'store'])->name('admin.menu-assignment.store');
    Route::get('admin/menu-assignments/{menuAssignment}/edit', [MenuAssignmentController::class, 'edit'])->name('admin.menu-assignment.edit');
    Route::put('admin/menu-assignments/{menuAssignment}', [MenuAssignmentController::class, 'update'])->name('admin.menu-assignment.update');
    Route::delete('admin/menu-assignments/{menuAssignment}', [MenuAssignmentController::class, 'destroy'])->name('admin.menu-assignment.destroy');
});

// Predictions & Report Routes
Route::get('admin/predictions', [PredictionController::class, 'showPredictions'])->name('admin.predictions.index')->middleware(['auth']);
