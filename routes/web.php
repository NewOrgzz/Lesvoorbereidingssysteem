<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LesvoorbereidingenController;
use App\Http\Controllers\SchooljarenController;
use App\Http\Controllers\VakkenController;
use App\Http\Controllers\LesversiesController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes (Lesvoorbereidingen, Schooljaren, Vakken)
Route::middleware('auth')->group(function () {
    Route::resource('lesvoorbereidingen', LesvoorbereidingenController::class);
    Route::resource('schooljaren', SchooljarenController::class);
    Route::resource('vakken', VakkenController::class);
    Route::resource('lesversies', LesversiesController::class);
    Route::get('/instellingen', function () {
        return view('instellingen');
    })->name('instellingen');
});

require __DIR__.'/auth.php';
