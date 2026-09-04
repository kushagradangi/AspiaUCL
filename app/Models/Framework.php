<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'related_domains',
        'description',
        'slug',
        'display_order',
    ];

    /**
     * Direct relationship: Framework has many Domains.
     */
    public function domains(): BelongsToMany
    {
        return $this->belongsToMany(Domain::class, 'framework_domain');
    }

    /**
     * Direct relationship: Framework has many Controls through Domains.
     */
    public function controls(): HasManyThrough
    {
        return $this->hasManyThrough(
            Control::class,
            Domain::class,
            'framework_id',
            'domain_id',
            'id',
            'id'
        );
    }

    /**
     * Mappings to requirements.
     */
    public function mappings(): HasMany
    {
        return $this->hasMany(RequirementFrameworkMapping::class, 'framework_id');
    }

    /**
     * Get all mapped Requirements for this compliance framework.
     */
    public function getMappedRequirements()
    {
        $mappedDomains = $this->domains()->get();
        if ($mappedDomains->isNotEmpty()) {
            $controlIds = Control::whereIn('domain_id', $mappedDomains->pluck('id'))
                ->pluck('control_id');

            return Requirement::with('control.domain')
                ->whereIn('control_id', $controlIds)
                ->orderBy('display_order', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        }

        // 1. Direct framework_id in mappings table
        $reqIds = RequirementFrameworkMapping::where('framework_id', $this->id)
            ->pluck('requirement_id')
            ->filter();

        // 2. Search by framework name, code, slug, or framework_id
        if ($reqIds->isEmpty()) {
            $name   = $this->name;
            $code   = $this->framework_code;
            $fwId   = $this->framework_id;
            $slug   = $this->slug;

            $allText = $name . ' ' . $code . ' ' . $slug . ' ' . $fwId;
            $normalizedText = str_ireplace('is0', 'iso', $allText);

            $tokens = array_unique(array_filter(preg_split('/[^A-Za-z0-9]+/', $allText . ' ' . $normalizedText)));

            $reqIds = RequirementFrameworkMapping::where(function ($q) use ($name, $code, $fwId, $slug, $tokens) {
                if ($name) {
                    $q->where('framework_name', 'like', "%{$name}%")
                      ->orWhere('framework_code', 'like', "%{$name}%");
                }
                if ($code) {
                    $cleanCode = str_ireplace('is0', 'iso', $code);
                    $q->orWhere('framework_name', 'like', "%{$code}%")
                      ->orWhere('framework_code', 'like', "%{$code}%")
                      ->orWhere('framework_name', 'like', "%{$cleanCode}%")
                      ->orWhere('framework_code', 'like', "%{$cleanCode}%");
                }
                if ($slug) {
                    $q->orWhere('framework_name', 'like', "%{$slug}%");
                }
                foreach ($tokens as $token) {
                    if (strlen($token) >= 3 && !in_array(strtolower($token), ['and', 'the', 'for', 'sec', 'std', 'rule', 'act'])) {
                        $q->orWhere('framework_name', 'like', "%{$token}%")
                          ->orWhere('framework_code', 'like', "%{$token}%");
                    }
                }
            })->pluck('requirement_id')->filter();
        }

        // 3. Fallback: If UCL / Universal Control Library or default, return all requirements
        $isUcl = str_contains(strtolower($this->name ?? ''), 'universal')
            || str_contains(strtolower($this->name ?? ''), 'ucl')
            || str_contains(strtolower($this->framework_code ?? ''), 'ucl')
            || str_contains(strtolower($this->framework_id ?? ''), 'ucl');

        if ($reqIds->isEmpty() && $isUcl) {
            return Requirement::with('control.domain')->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
        }

        if ($reqIds->isEmpty()) {
            // Direct child requirements via controls
            $directControlIds = Control::where('domain_id', $this->id)
                ->orWhereIn('domain_id', Domain::where('framework_id', $this->id)->pluck('id'))
                ->pluck('control_id');
            if ($directControlIds->isNotEmpty()) {
                return Requirement::with('control.domain')->whereIn('control_id', $directControlIds)->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
            }

            return collect();
        }

        return Requirement::with('control.domain')
            ->whereIn('requirement_id', $reqIds)
            ->orderBy('display_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();
    }

    /**
     * Get all mapped Controls for this framework.
     */
    public function getMappedControls()
    {
        $mappedDomains = $this->domains()->get();
        if ($mappedDomains->isNotEmpty()) {
            return Control::with('domain')
                ->whereIn('domain_id', $mappedDomains->pluck('id'))
                ->orderBy('display_order', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        }

        $requirements = $this->getMappedRequirements();
        $controlIds = $requirements->pluck('control_id')->filter()->unique();

        if ($controlIds->isEmpty()) {
            $direct = $this->controls()->get();
            if ($direct->isNotEmpty()) {
                return $direct;
            }

            $isUcl = str_contains(strtolower($this->name ?? ''), 'universal')
                || str_contains(strtolower($this->name ?? ''), 'ucl')
                || str_contains(strtolower($this->framework_code ?? ''), 'ucl')
                || str_contains(strtolower($this->framework_id ?? ''), 'ucl');

            if ($isUcl) {
                return Control::with('domain')->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
            }

            return collect();
        }

        return Control::with('domain')
            ->whereIn('control_id', $controlIds)
            ->orderBy('display_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();
    }

    /**
     * Get all mapped Domains for this framework.
     */
    public function getMappedDomains()
    {
        $mapped = $this->domains()->with('controls')->get();
        if ($mapped->isNotEmpty()) {
            return $mapped->sortBy(fn ($domain) => [$domain->display_order, $domain->id])->values();
        }

        $controls = $this->getMappedControls();
        $domainIds = $controls->pluck('domain_id')->filter()->unique();
        $domainCodes = $controls->pluck('domain_code')->filter()->unique();

        if ($domainIds->isEmpty() && $domainCodes->isEmpty()) {
            $direct = $this->domains()->get();
            if ($direct->isNotEmpty()) {
                return $direct;
            }

            $isUcl = str_contains(strtolower($this->name ?? ''), 'universal')
                || str_contains(strtolower($this->name ?? ''), 'ucl')
                || str_contains(strtolower($this->framework_code ?? ''), 'ucl')
                || str_contains(strtolower($this->framework_id ?? ''), 'ucl');

            if ($isUcl) {
                return Domain::with('controls')->orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
            }

            return collect();
        }

        return Domain::with('controls')
            ->where(function ($q) use ($domainIds, $domainCodes) {
                if ($domainIds->isNotEmpty()) {
                    $q->whereIn('id', $domainIds);
                }
                if ($domainCodes->isNotEmpty()) {
                    $q->orWhereIn('domain_code', $domainCodes)
                      ->orWhereIn('domain_id', $domainCodes);
                }
            })
            ->orderBy('display_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();
    }
}