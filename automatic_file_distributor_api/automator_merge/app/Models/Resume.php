<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'file_path',
        'name',
        'email',
        'phone',
        'platforms',
    ];

    protected $casts = [
        'platforms' => 'array',
    ];
}

