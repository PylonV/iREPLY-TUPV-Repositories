<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ResumeApiController;

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


Route::get('/resumes', [ResumeController::class, 'index'])->name('resume.index');
Route::post('/resumes', [ResumeController::class, 'store'])->name('resume.store');
Route::get('/resumes/{id}', [ResumeController::class, 'show'])->name('resume.show');
Route::delete('/resumes/{id}', [ResumeController::class, 'destroy'])->name('resume.destroy');
Route::get('/resumes/download/{filename}', [ResumeController::class, 'download'])->name('resume.download');
