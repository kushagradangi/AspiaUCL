<?php

namespace App\Services;

use App\Models\Domain;
use App\Models\Framework;
use Illuminate\Support\Collection;

class RelationshipResolver
{
    public function syncFrameworkDomains(Framework $framework): Collection
    {
        $references = $this->references($framework->related_domains);
        if ($references->isEmpty()) {
            return collect();
        }

        $domains = $this->resolveDomains($references);
        if ($domains->isNotEmpty()) {
            $framework->domains()->syncWithoutDetaching($domains->pluck('id')->all());
        }

        return $domains;
    }

    public function resolveDomains(Collection $references): Collection
    {
        return $references
            ->map(fn (string $reference) => $this->findDomain($reference))
            ->filter()
            ->unique('id')
            ->values();
    }

    public function resolveFrameworks($references): Collection
    {
        if (is_string($references)) {
            $references = $this->references($references);
        } elseif (is_array($references)) {
            $references = collect($references);
        } elseif (!$references instanceof Collection) {
            return collect();
        }

        return $references
            ->map(fn ($reference) => $this->findFramework((string) $reference))
            ->filter()
            ->unique('id')
            ->values();
    }

    public function getValidMappedFrameworks(?int $frameworkId = null, ?string $relatedFrameworks = null): Collection
    {
        $frameworks = collect();

        if ($frameworkId) {
            $fw = Framework::find($frameworkId);
            if ($fw) {
                $frameworks->push($fw);
            }
        }

        if ($relatedFrameworks) {
            $resolved = $this->resolveFrameworks($relatedFrameworks);
            $frameworks = $frameworks->merge($resolved);
        }

        return $frameworks->unique('id')->values();
    }

    public function syncDomainFrameworks(Domain $domain): Collection
    {
        $references = $this->references($domain->related_frameworks);
        if ($references->isEmpty()) {
            return collect();
        }

        $frameworks = $references
            ->map(fn (string $reference) => $this->findFramework($reference))
            ->filter()
            ->unique('id')
            ->values();

        if ($frameworks->isNotEmpty()) {
            $domain->frameworks()->syncWithoutDetaching($frameworks->pluck('id')->all());
        }

        return $frameworks;
    }

    public function references(?string $value): Collection
    {
        if (!$value) {
            return collect();
        }

        return collect(preg_split('/[,;|\r\n]+/', $value))
            ->map(fn ($reference) => trim((string) $reference))
            ->filter()
            ->values();
    }

    public function findDomain(string|int $reference): ?Domain
    {
        $raw = trim((string) $reference);
        if ($raw === '') {
            return null;
        }

        if (is_numeric($raw)) {
            $byPk = Domain::find((int) $raw);
            if ($byPk) {
                return $byPk;
            }
        }

        $normalized = $this->normalize($raw);

        return Domain::query()
            ->where(function ($query) use ($raw, $normalized) {
                $query->whereRaw('LOWER(TRIM(domain_id)) = ?', [strtolower($raw)])
                    ->orWhereRaw('LOWER(TRIM(domain_code)) = ?', [strtolower($raw)])
                    ->orWhereRaw('LOWER(TRIM(name)) = ?', [$normalized])
                    ->orWhereRaw('LOWER(TRIM(slug)) = ?', [$normalized]);
            })
            ->first();
    }

    public function findFramework(string|int $reference): ?Framework
    {
        $raw = trim((string) $reference);
        if ($raw === '') {
            return null;
        }

        if (is_numeric($raw)) {
            $byPk = Framework::find((int) $raw);
            if ($byPk) {
                return $byPk;
            }
        }

        $normalized = $this->normalize($raw);

        return Framework::query()
            ->where(function ($query) use ($raw, $normalized) {
                $query->whereRaw('LOWER(TRIM(framework_id)) = ?', [strtolower($raw)])
                    ->orWhereRaw('LOWER(TRIM(framework_code)) = ?', [strtolower($raw)])
                    ->orWhereRaw('LOWER(TRIM(name)) = ?', [$normalized])
                    ->orWhereRaw('LOWER(TRIM(slug)) = ?', [$normalized]);
            })
            ->first();
    }

    private function normalize(string $value): string
    {
        return strtolower(trim(preg_replace('/[^a-z0-9]+/i', ' ', $value)));
    }
}
