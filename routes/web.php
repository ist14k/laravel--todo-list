<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('todo.index');
})->name('home');

Route::get('/todo', function () {
    return view('todo.index');
})->name('todo.index')->middleware('auth');

Route::get('/todo/{id}', function ($id) {
    return view('todo.show', ['id' => $id]);
})->name('todo.show')->middleware('auth');

Route::get('/register', [RegistrationController::class, 'show'])->name('register');
Route::post('/register', [RegistrationController::class, 'register'])->name('register.register');

Route::get('/login', [SessionController::class, 'show'])->name('login');
Route::post('/login', [SessionController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
