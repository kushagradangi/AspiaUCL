<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControlTemplate extends Model
{
    protected $fillable = [
        'name',
        'html_content',
    ];
}