<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Resume;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Resume API",
 *     version="1.0.0",
 *     description="API for managing resume uploads"
 * )
 *
 * @OA\Tag(
 *     name="Resumes",
 *     description="API Endpoints for Resumes"
 * )
 */
class ResumeApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/resumes",
     *     summary="Get list of resumes",
     *     tags={"Resumes"},
     *     @OA\Response(
     *         response=200,
     *         description="List of resumes",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="filename", type="string"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Resume::all());
    }

    /**
     * @OA\Post(
     *     path="/api/resumes",
     *     summary="Upload a new resume",
     *     tags={"Resumes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"resume", "name", "email", "phone", "platforms"},
     *                 @OA\Property(property="resume", type="file", description="Resume file"),
     *                 @OA\Property(property="name", type="string", description="Full name of the applicant"),
     *                 @OA\Property(property="email", type="string", format="email", description="Applicant's email address"),
     *                 @OA\Property(property="phone", type="string", description="Phone number"),
     *                 @OA\Property(property="platforms", type="string", description="Comma-separated platforms or job boards")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Resume uploaded successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="email", type="string"),
     *                 @OA\Property(property="phone", type="string"),
     *                 @OA\Property(property="platforms", type="string"),
     *                 @OA\Property(property="filename", type="string"),
     *                 @OA\Property(property="created_at", type="string", format="date-time"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time")
     *             )
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:25',
            'platforms' => 'required|string',
        ]);

        $file = $request->file('resume');
        $path = $file->store('resumes');

        $resume = Resume::create([
            'file_path' => $path,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'platforms' => $request->input('platforms'),
            'filename' => basename($path),
        ]);

        return response()->json(['message' => 'Resume uploaded', 'data' => $resume], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/resumes/{id}",
     *     summary="Get a specific resume",
     *     tags={"Resumes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Resume ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Resume found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="filename", type="string"),
     *             @OA\Property(property="created_at", type="string", format="date-time"),
     *             @OA\Property(property="updated_at", type="string", format="date-time")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resume not found"
     *     )
     * )
     */
    public function show($id)
    {
        $resume = Resume::find($id);

        if (!$resume) {
            return response()->json(['message' => 'Resume not found'], 404);
        }

        return response()->json($resume);
    }

    /**
     * @OA\Delete(
     *     path="/api/resumes/{id}",
     *     summary="Delete a specific resume",
     *     tags={"Resumes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Resume ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Resume deleted"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Resume not found"
     *     )
     * )
     */
    public function destroy($id)
    {
        $resume = Resume::find($id);

        if (!$resume) {
            return response()->json(['message' => 'Resume not found'], 404);
        }

        Storage::delete('resumes/' . $resume->filename);
        $resume->delete();

        return response()->json(['message' => 'Resume deleted']);
    }
}
