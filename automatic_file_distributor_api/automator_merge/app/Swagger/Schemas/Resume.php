<?php

/**
 * @OA\Schema(
 *     schema="Resume",
 *     type="object",
 *     title="Resume",
 *     required={"id", "name", "filename"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="filename", type="string", example="resume_john.pdf"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-08-01T12:34:56Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-08-01T12:34:56Z")
 * )
 */
