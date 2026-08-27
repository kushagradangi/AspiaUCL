<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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
        'display_order',
    ];

    /**
     * Framework has many Domains.
     */
    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class, 'framework_id');
    }

    /**
     * Framework has many Controls through Domains.
     */
    public function controls(): HasManyThrough
    {
        return $this->hasManyThrough(
            Control::class,
            Domain::class,
            'framework_id', // Foreign key on domains table
            'domain_id',    // Foreign key on controls table
            'id',           // Local key on frameworks table
            'id'            // Local key on domains table
        );
    }
}