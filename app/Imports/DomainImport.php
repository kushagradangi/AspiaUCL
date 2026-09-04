<?php

namespace App\Imports;

use App\Models\Domain;
use App\Services\RelationshipResolver;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Events\AfterImport;

class DomainImport implements ToModel, WithStartRow, WithEvents
{
    private int $createdCount = 0;
    private int $updatedCount = 0;
    private int $currentRow = 0;

    public function getCreatedCount(): int
    {
        return $this->createdCount;
    }

    public function getUpdatedCount(): int
    {
        return $this->updatedCount;
    }

    public function registerEvents(): array
    {
        return [
            AfterImport::class => function () {
                $resolver = app(RelationshipResolver::class);
                Domain::whereNotNull('related_frameworks')
                    ->where('related_frameworks', '!=', '')
                    ->each(fn (Domain $domain) => $resolver->syncDomainFrameworks($domain));
            },
        ];
    }

    /**
     * Excel row 1 contains the headers.
     * Start importing from row 2.
     */
    public function startRow(): int
    {
        return 2;
    }


    /**
     * Import one Excel row.
     */
    public function model(array $row)
    {
        // Skip completely empty rows
        if (
            empty($row[0]) &&
            empty($row[1]) &&
            empty($row[2])
        ) {
            return null;
        }

        $this->currentRow++;

        $domainId = $this->value($row, 0);
        $domainCode = $this->value($row, 1);
        $name = $this->value($row, 2);

        if (empty($domainId) || empty($name)) {
            return null;
        }

        $relatedFrameworks = $this->value($row, 23);
        $frameworkId = null;
        if ($relatedFrameworks) {
            $firstFwName = trim(explode(',', $relatedFrameworks)[0]);
            $matchedFw = \App\Models\Framework::where('name', 'like', "%{$firstFwName}%")
                ->orWhere('framework_code', 'like', "%{$firstFwName}%")
                ->first();
            if ($matchedFw) {
                $frameworkId = $matchedFw->id;
            }
        }

        // Check if existing domain should be replaced / updated
        $existing = Domain::where('domain_id', $domainId)
            ->when($domainCode, function ($q) use ($domainCode) {
                return $q->orWhere('domain_code', $domainCode);
            })
            ->first();

        if ($existing) {
            $existing->update([
                'framework_id' => $frameworkId ?? $existing->framework_id,
                'domain_id' => $domainId,
                'domain_code' => $domainCode ?? $existing->domain_code,
                'name' => $name,
                'slug' => $this->value($row, 3) ?? $existing->slug,
                'purpose' => $this->value($row, 4) ?? $existing->purpose,
                'scope' => $this->value($row, 5) ?? $existing->scope,
                'business_owner' => $this->value($row, 6) ?? $existing->business_owner,
                'description' => $this->value($row, 7) ?? $existing->description,
                'display_order' => ($this->value($row, 8) !== null && $this->value($row, 8) !== '')
                    ? (int) $this->value($row, 8)
                    : $existing->display_order,
                'status' => $this->value($row, 9) ?: ($existing->status ?: 'Active'),
                'version' => $this->value($row, 10) ?? $existing->version,
                'short_overview' => $this->value($row, 11) ?? $existing->short_overview,
                'business_objectives' => $this->value($row, 12) ?? $existing->business_objectives,
                'business_risks' => $this->value($row, 13) ?? $existing->business_risks,
                'key_capabilities' => $this->value($row, 14) ?? $existing->key_capabilities,
                'typical_stakeholders' => $this->value($row, 15) ?? $existing->typical_stakeholders,
                'applicable_industries' => $this->value($row, 16) ?? $existing->applicable_industries,
                'applicable_technologies' => $this->value($row, 17) ?? $existing->applicable_technologies,
                'keywords' => $this->value($row, 18) ?? $existing->keywords,
                'tags' => $this->value($row, 19) ?? $existing->tags,
                'why_domain_matters' => $this->value($row, 20) ?? $existing->why_domain_matters,
                'common_challenges' => $this->value($row, 21) ?? $existing->common_challenges,
                'related_domains' => $this->value($row, 22) ?? $existing->related_domains,
                'related_frameworks' => $this->value($row, 23) ?? $existing->related_frameworks,
            ]);

            $this->updatedCount++;
            return null;
        }

        $this->createdCount++;

        return new Domain([

            'framework_id' => $frameworkId,

            /*
            |--------------------------------------------------------------------------
            | 1. Domain ID
            |--------------------------------------------------------------------------
            */

            'domain_id' =>
                $this->value($row, 0),


            /*
            |--------------------------------------------------------------------------
            | 2. Domain Code
            |--------------------------------------------------------------------------
            */

            'domain_code' =>
                $this->value($row, 1),


            /*
            |--------------------------------------------------------------------------
            | 3. Domain Name
            |--------------------------------------------------------------------------
            */

            'name' =>
                $this->value($row, 2),


            /*
            |--------------------------------------------------------------------------
            | 4. Slug
            |--------------------------------------------------------------------------
            */

            'slug' =>
                $this->value($row, 3),


            /*
            |--------------------------------------------------------------------------
            | 5. Purpose
            |--------------------------------------------------------------------------
            */

            'purpose' =>
                $this->value($row, 4),


            /*
            |--------------------------------------------------------------------------
            | 6. Scope
            |--------------------------------------------------------------------------
            */

            'scope' =>
                $this->value($row, 5),


            /*
            |--------------------------------------------------------------------------
            | 7. Business Owner
            |--------------------------------------------------------------------------
            */

            'business_owner' =>
                $this->value($row, 6),


            /*
            |--------------------------------------------------------------------------
            | 8. Description
            |--------------------------------------------------------------------------
            */

            'description' =>
                $this->value($row, 7),


            /*
            |--------------------------------------------------------------------------
            | 9. Display Order
            |--------------------------------------------------------------------------
            */

            'display_order' =>
                $this->value($row, 8) !== null &&
                $this->value($row, 8) !== ''
                    ? (int) $this->value($row, 8)
                    : $this->currentRow,


            /*
            |--------------------------------------------------------------------------
            | 10. Status
            |--------------------------------------------------------------------------
            */

            'status' =>
                $this->value($row, 9) ?: 'Active',


            /*
            |--------------------------------------------------------------------------
            | 11. Version
            |--------------------------------------------------------------------------
            */

            'version' =>
                $this->value($row, 10),


            /*
            |--------------------------------------------------------------------------
            | 12. Short Overview
            |--------------------------------------------------------------------------
            */

            'short_overview' =>
                $this->value($row, 11),


            /*
            |--------------------------------------------------------------------------
            | 13. Business Objectives
            |--------------------------------------------------------------------------
            */

            'business_objectives' =>
                $this->value($row, 12),


            /*
            |--------------------------------------------------------------------------
            | 14. Business Risks
            |--------------------------------------------------------------------------
            */

            'business_risks' =>
                $this->value($row, 13),


            /*
            |--------------------------------------------------------------------------
            | 15. Key Capabilities
            |--------------------------------------------------------------------------
            */

            'key_capabilities' =>
                $this->value($row, 14),


            /*
            |--------------------------------------------------------------------------
            | 16. Typical Stakeholders
            |--------------------------------------------------------------------------
            */

            'typical_stakeholders' =>
                $this->value($row, 15),


            /*
            |--------------------------------------------------------------------------
            | 17. Applicable Industries
            |--------------------------------------------------------------------------
            */

            'applicable_industries' =>
                $this->value($row, 16),


            /*
            |--------------------------------------------------------------------------
            | 18. Applicable Technologies
            |--------------------------------------------------------------------------
            */

            'applicable_technologies' =>
                $this->value($row, 17),


            /*
            |--------------------------------------------------------------------------
            | 19. Keywords
            |--------------------------------------------------------------------------
            */

            'keywords' =>
                $this->value($row, 18),


            /*
            |--------------------------------------------------------------------------
            | 20. Tags
            |--------------------------------------------------------------------------
            */

            'tags' =>
                $this->value($row, 19),


            /*
            |--------------------------------------------------------------------------
            | 21. Why This Domain Matters
            |--------------------------------------------------------------------------
            */

            'why_domain_matters' =>
                $this->value($row, 20),


            /*
            |--------------------------------------------------------------------------
            | 22. Common Challenges
            |--------------------------------------------------------------------------
            */

            'common_challenges' =>
                $this->value($row, 21),


            /*
            |--------------------------------------------------------------------------
            | 23. Related Domains
            |--------------------------------------------------------------------------
            */

            'related_domains' =>
                $this->value($row, 22),


            /*
            |--------------------------------------------------------------------------
            | 24. Related Frameworks
            |--------------------------------------------------------------------------
            */

            'related_frameworks' =>
                $this->value($row, 23),

        ]);
    }


    /**
     * Safely get an Excel column value.
     */
    private function value(array $row, int $index): ?string
    {
        if (!isset($row[$index])) {
            return null;
        }

        $value = trim((string) $row[$index]);

        return $value === ''
            ? null
            : $value;
    }
}