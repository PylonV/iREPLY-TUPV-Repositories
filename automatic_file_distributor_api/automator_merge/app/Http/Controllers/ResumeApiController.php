<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;

class ResumeApiController extends Controller
{
    public function index()
    {
        return response()->json(Resume::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'platforms' => 'array',
            'platforms.*' => 'string',
        ]);

        $path = $request->file('resume')->store('resumes');

        $resume = Resume::create([
            'file_path' => $path,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'platforms' => json_encode($request->input('platforms')),
        ]);

        return response()->json($resume, 201);
    }

    public function show($id)
    {
        $resume = Resume::find($id);

        if (!$resume) {
            return response()->json(['error' => 'Resume not found'], 404);
        }

        return response()->json($resume);
    }

    public function destroy($id)
    {
        $resume = Resume::find($id);

        if (!$resume) {
            return response()->json(['error' => 'Resume not found'], 404);
        }

        $resume->delete();

        return response()->json(['message' => 'Resume deleted']);
    }
}
