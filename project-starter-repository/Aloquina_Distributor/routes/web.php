<?php

use Illuminate\Support\Facades\Route;

// auth routes
include __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('welcome');
    // applicant routes
    Route::resource('applicants', 'App\Http\Controllers\ApplicantController');
});
