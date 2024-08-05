<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Route for the login page as the index
Route::get('/', function () {
    return view('auth.login'); // Ensure the view name is correct
});

// Authentication routes
Auth::routes(['register' => false]);

// Routes accessible only to authenticated users
Route::middleware(['auth'])->group(function () {
    // Dashboard or home route for authenticated users
    Route::get('/', [HomeController::class, 'index'])->name('index');

    // Additional routes that require authentication
    Route::get('/{page}', [AdminController::class, 'index']);
});
