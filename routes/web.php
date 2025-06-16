<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonPreparationController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Lesvoorbereidingen
    Route::resource('lesvoorbereidingen', LessonPreparationController::class);
    // Schooljaren
    Route::resource('schooljaren', SchoolYearController::class);
    // Vakken
    Route::resource('vakken', SubjectController::class);
});

require __DIR__.'/auth.php';
