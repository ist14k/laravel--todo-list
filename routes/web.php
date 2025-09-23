<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('todo.index');
});

Route::get('/todo', function () {
    return view('todo.index');
})->name('todo.index');
