<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeDownload extends Model
{
    protected $fillable = ['file_path', 'user_email', 'downloaded_at'];
}
