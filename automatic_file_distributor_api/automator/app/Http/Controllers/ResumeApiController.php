<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumes = \App\Models\Resume::all();
        return response()->json($resumes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
        
        $file = $request->file('resume');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('resumes', $filename);

        $resume = \App\Models\Resume::create([
            'original_name' => $file->getClientOriginalName(),
            'path' => $path,
        ]);

        return response()->json(['message' => 'Resume uploaded', 'data' => $resume], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resume = \App\Models\Resume::findOrFail($id);
        return response()->json($resume);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resume = \App\Models\Resume::findOrFail($id);

        if (Storage::exists($resume->path)) {
        Storage::delete($resume->path);
        }
        
        Storage::delete($resume->path);
        $resume->delete();

        return response()->json(['message' => 'Resume deleted']);
    }
}
