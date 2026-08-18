<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomainTemplate extends Model
{
    protected $fillable = [
        'name',
        'html_content',
    ];
}