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

    private function findDomain(string $reference): ?Domain
    {
        $normalized = $this->normalize($reference);

        return Domain::query()
            ->where(function ($query) use ($reference, $normalized) {
                $query->whereRaw('LOWER(TRIM(domain_id)) = ?', [strtolower(trim($reference))])
                    ->orWhereRaw('LOWER(TRIM(domain_code)) = ?', [strtolower(trim($reference))])
                    ->orWhereRaw('LOWER(TRIM(name)) = ?', [$normalized])
                    ->orWhereRaw('LOWER(TRIM(slug)) = ?', [$normalized]);
            })
            ->first();
    }

    private function findFramework(string $reference): ?Framework
    {
        $normalized = $this->normalize($reference);

        return Framework::query()
            ->where(function ($query) use ($reference, $normalized) {
                $query->whereRaw('LOWER(TRIM(framework_id)) = ?', [strtolower(trim($reference))])
                    ->orWhereRaw('LOWER(TRIM(framework_code)) = ?', [strtolower(trim($reference))])
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
