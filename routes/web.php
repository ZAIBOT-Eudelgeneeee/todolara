<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    return view('dashboard');
// });

// Route::resource('tasks', TaskController::class);//COMPACTING TASKS CLASSES

//MANUAL ROUTING
Route::get('/',[TaskController::class, 'index'])->name('dashboard');
Route::post('/tasks/create', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/tasks/{id}/edit', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy');

// ROUTE FOR USER AUTHENTICATION (SIGNUP AND LOGIN)
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'loginAuth'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');