<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZohoResume extends Model
{
    protected $connection = 'zoho';
    protected $table = 'data-zoho';
    protected $fillable = ['name', 'email', 'number', 'resume'];
}
