<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use App\Models\ResumeDownload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Jobs\UploadResumeJob;

class ResumeController extends Controller
{
    /**
     * List resumes (web or JSON).
     */
    public function index(Request $request)
    {
        $resumes = Resume::latest()->get();

        if ($request->wantsJson()) {
            return response()->json($resumes);
        }

        return view('resumes.index', compact('resumes'));
    }

    /**
     * Unified upload endpoint (web + API + job dispatching).
     */
    public function store(Request $request)
    {
        Log::info('Resume upload:', $request->all());

        // Validate
        $validated = $request->validate([
            'resume'    => 'required|file|mimes:pdf,doc,docx|max:2048',
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'required|string|max:20',
            'platforms' => 'nullable|array',
            'platforms.*' => 'in:Airtable,Zoho', // optional: validate values
        ]);

        // Store file
        $file = $request->file('resume');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('resumes', $filename);

        // Save to DB
        $resume = Resume::create([
            'file_path' => $filePath,
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'],
            'platforms' => isset($validated['platforms']) ? json_encode($validated['platforms']) : null,
        ]);

        // Dispatch jobs for each selected platform
        foreach ($validated['platforms'] ?? [] as $platform) {
            UploadResumeJob::dispatch($filePath, $platform);
        }

        // Response
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Resume uploaded and queued for sending.',
                'data' => $resume
            ], 201);
        }

        return redirect()->back()->with('success', 'Resume is being sent!');
    }

    /**
     * Show a specific resume.
     */
    public function show(Request $request, $id)
    {
        $resume = Resume::findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json($resume);
        }

        return view('resumes.show', compact('resume'));
    }

    /**
     * Optional: Resume download with logging.
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
            'user_email' => auth()->guard('web')->check() ? auth()->guard('web')->user()->email : null,
        ]);

        return Storage::download($filePath);
    }

    /**
     * Delete a resume.
     */
    public function destroy(Request $request, $id)
    {
        $resume = Resume::findOrFail($id);

        if ($resume->file_path && Storage::exists($resume->file_path)) {
            Storage::delete($resume->file_path);
        }

        $resume->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Resume deleted']);
        }

        return redirect()->back()->with('success', 'Resume deleted.');
    }
}
