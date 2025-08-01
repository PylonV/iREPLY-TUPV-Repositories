<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::get('/', function () {
    return view('home');
});

Route::get('/upload', function () {
    return view('resumes.upload');
});
Route::get('/home', function () {
    return view('home');
})->name('home');


Route::post('/upload', [ResumeController::class, 'upload'])->name('resumes.upload');


Route::get('/resumes/download/{filename}', [ResumeController::class, 'download'])->name('resumes.download');