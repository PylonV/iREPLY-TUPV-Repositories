<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('home');

Route::get('/upload', function () {
    return view('resumes.upload');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/upload', function () {
        return view('resumes.upload'); // or 'upload' if you have a separate view
    })->name('upload');
});
require __DIR__.'/auth.php';
