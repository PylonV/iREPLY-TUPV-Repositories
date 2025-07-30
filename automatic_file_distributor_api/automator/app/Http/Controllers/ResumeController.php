<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\ResumeDownload;
use App\Jobs\UploadResumeJob;
use App\Models\Resume; 

class ResumeController extends Controller
{
    /**
     * Handle resume upload and dispatch upload jobs.
     */
    public function upload(Request $request)
    {
        $request->validate([
        'resume' => 'required|file|mimes:pdf,doc,docx',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'destinations' => 'required|array',
    ]);

    $path = $request->file('resume')->store('resumes');

    // Save data to database
    $resume = new Resume();
    $resume->name = $request->name;
    $resume->email = $request->email;
    $resume->phone = $request->phone;
    $resume->file_path = $path;
    $resume->destinations = json_encode($request->destinations);
    $resume->save();

    // Dispatch background jobs
    foreach ($request->destinations as $destination) {
        UploadResumeJob::dispatch($path, $destination);
    }

    return redirect()->back()->with('success', 'Resume is being sent!');

    }

    /**
     * Handle resume download and log the download.
     */
    public function download($filename)
    {
        $filePath = 'resumes/' . $filename;

        if (!Storage::exists($filePath)) {
            abort(404, 'File not found.');
        }

        // Log download
        ResumeDownload::create([
            'file_path' => $filePath,
            'user_email' => auth()-> guard('web')-> check() ? auth()->guard('web')->user()->email : null,
        ]);

        return Storage::download($filePath);
    }
}
