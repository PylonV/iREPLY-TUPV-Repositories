<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard'); // Assuming dashboard.blade.php is in resources/views
})->name('dashboard');