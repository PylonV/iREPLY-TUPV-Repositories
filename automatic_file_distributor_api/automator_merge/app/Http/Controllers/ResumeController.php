<?php

namespace App\Http\Controllers;

use App\Models\Resume; 
use Illuminate\Http\Request;
use App\Jobs\UploadResumeJob;
use App\Models\ResumeDownload;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ResumeController extends Controller
{
    /**
     * Handle resume upload and dispatch upload jobs.
     */
    public function upload(Request $request)
    {
        Log::info('Resume upload:', $request->all());

        // Validate form inputs
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'platforms' => 'nullable|array', // Make this nullable, since it's optional
        ]);

        // Store uploaded file
        $path = $request->file('resume')->store('resumes');

        // Save data to database
        $resume = new Resume();
        $resume->file_path = $path;
        $resume->name = $request->name;
        $resume->email = $request->email;
        $resume->phone = $request->phone;
        $resume->platforms = json_encode($request->platforms ?? []); // store as JSON
        $resume->save();

        // Optional: Dispatch background jobs (if needed)
        foreach ($request->platforms ?? [] as $platform) {
            UploadResumeJob::dispatch($path, $platform);
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
    public function showAll()
{
    $resumes = \App\Models\Resume::latest()->get();
    return view('resume_list', compact('resumes'));
}
public function uploadForm()
{
    return view('resumes.upload');
}

}
