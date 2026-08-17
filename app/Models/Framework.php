<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    protected $fillable = [
        'framework_id',
        'framework_code',
        'name',
        'version',
        'framework_family',
        'category',
        'publisher',
        'region',
        'industry',
        'framework_type',
        'description',
        'slug',
    ];

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
}