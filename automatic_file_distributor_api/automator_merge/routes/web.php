<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/upload', function () {
    return view('resumes.upload');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Models\Resume;         // SQLite model
use App\Models\MySQLResume;    // MySQL model

Route::get('/migrate-resumes', function () {
    $resumes = Resume::all();

    foreach ($resumes as $res) {
        MySQLResume::create([
            'name'   => $res->name,
            'email'  => $res->email,
            'number' => $res->phone,
            'resume' => $res->file_path,
        ]);
    }

    return "Migration complete.";
});


Route::get('/view-resumes', function () {
    $data = Resume::all();
    return view('resumes', ['data' => $data]);
});

use App\Models\ZohoResume;

Route::get('/view-zoho-resumes', function () {
    $data = ZohoResume::all();
    return view('zoho', ['data' => $data]);
});

