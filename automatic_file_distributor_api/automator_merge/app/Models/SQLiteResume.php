<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SQLiteResume extends Model
{
    protected $connection = 'sqlite_resume';
    protected $table = 'resumes';
}
