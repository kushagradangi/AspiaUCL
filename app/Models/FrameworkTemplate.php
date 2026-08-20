<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrameworkTemplate extends Model
{
    protected $fillable = [
        'name',
        'framework_type',
        'html_content',
    ];
}