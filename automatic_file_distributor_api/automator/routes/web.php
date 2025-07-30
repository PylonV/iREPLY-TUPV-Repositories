<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::get('/upload', function () {
    return view('resumes.upload');
});

Route::post('/upload', [ResumeController::class, 'upload'])->name('resumes.upload');

Route::get('/resumes/download/{filename}', [ResumeController::class, 'download'])->name('resumes.download');
