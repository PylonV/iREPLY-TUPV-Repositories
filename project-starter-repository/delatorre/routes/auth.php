<?php

use Illuminate\Support\Facades\Route;

Route::get('login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('login', 'App\Http\Controllers\AuthController@authenticate')->name('authenticate');
Route::post('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
