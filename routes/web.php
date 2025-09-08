<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    return view('dashboard');
// });

// Route::resource('tasks', TaskController::class);

Route::get('/',[TaskController::class, 'index'])->name('dashboard');
Route::resource('tasks', TaskController::class);
