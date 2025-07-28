<?php

use App\Http\Controllers\ResumeApiController;
use Illuminate\Support\Facades\Route;

Route::get('/resumes', [ResumeApiController::class, 'index'])->name('resume.index');
Route::post('/resumes', [ResumeApiController::class, 'store'])->name('resume.store');
Route::get('/resumes/{id}', [ResumeApiController::class, 'show'])->name('resume.show');
Route::delete('/resumes/{id}', [ResumeApiController::class, 'destroy'])->name('resume.destroy');