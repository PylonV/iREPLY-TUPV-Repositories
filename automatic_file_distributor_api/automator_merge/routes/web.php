<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

// Homepage
Route::get('/', function () {
    return view('home');
});

// Upload form (GET)
Route::get('/upload', [ResumeController::class, 'showForm'])->name('resumes.upload.form');

// Upload handler (POST)
Route::post('/upload', [ResumeController::class, 'upload'])->name('resumes.upload');

// Resume list view
Route::get('/list', [ResumeController::class, 'showAll'])->name('resumes.list');

// Resume file download
Route::get('/download/{filename}', [ResumeController::class, 'download'])->name('resumes.download');
