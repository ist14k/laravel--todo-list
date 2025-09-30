<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('home');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index')->middleware('auth');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store')->middleware('auth');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show')->middleware('auth');



Route::get('/register', [RegistrationController::class, 'show'])->name('register');
Route::post('/register', [RegistrationController::class, 'register'])->name('register.register');

Route::get('/login', [SessionController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');
