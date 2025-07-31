<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MySQLResume extends Model
{
    protected $connection = 'mysql'; // target MySQL
    protected $table = 'data';       // MySQL table name
    protected $fillable = ['name', 'email', 'number', 'resume'];
}
