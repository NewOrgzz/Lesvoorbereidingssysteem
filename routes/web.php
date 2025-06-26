<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonPreparationController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});
