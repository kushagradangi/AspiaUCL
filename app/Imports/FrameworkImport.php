<?php

namespace App\Imports;

use App\Models\Framework;
use App\Services\RelationshipResolver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;

class FrameworkImport implements ToModel, WithHeadingRow, WithEvents
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
                Framework::whereNotNull('related_domains')
                    ->where('related_domains', '!=', '')
                    ->each(fn (Framework $framework) => $resolver->syncFrameworkDomains($framework));
            },
        ];
    }

    public function model(array $row): Model|array|null
    {
        /*
        |--------------------------------------------------------------------------
        | Framework Name & Identifiers
        |--------------------------------------------------------------------------
        */

        $name = $row['framework_name'] ?? ($row['name'] ?? null);
        $frameworkId = $row['framework_id'] ?? null;
        $frameworkCode = $row['framework_code'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Skip empty rows
        |--------------------------------------------------------------------------
        */

        if (empty($frameworkId) || empty($name)) {
            return null;
        }

        $this->currentRow++;

        /*
        |--------------------------------------------------------------------------
        | Check for existing record to replace / update
        |--------------------------------------------------------------------------
        */

        $existing = Framework::where('framework_id', $frameworkId)
            ->when($frameworkCode, function ($q) use ($frameworkCode) {
                return $q->orWhere('framework_code', $frameworkCode);
            })
            ->first();

        if ($existing) {
            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 1;

            while (Framework::where('slug', $slug)->where('id', '!=', $existing->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $purposeObjective = $row['purpose_objective'] ?? ($row['purpose'] ?? ($row['objective'] ?? null));
            $description = $row['overview_description'] ?? ($row['description'] ?? ($row['overview'] ?? null));
            $scope = $row['scope'] ?? null;
            $keyFocusAreas = $row['key_focus_areas'] ?? ($row['key_focus'] ?? null);
            $structureDomains = $row['structure_domains'] ?? ($row['structure'] ?? null);
            $certificationAssessment = $row['certification_assessment'] ?? ($row['certification'] ?? null);
            $relatedFrameworks = $row['related_frameworks'] ?? null;
            $officialSourceUrl = $row['official_source_url'] ?? ($row['official_source'] ?? ($row['url'] ?? null));

            $existing->update([
                'framework_id' => $frameworkId,
                'framework_code' => $frameworkCode ?? $existing->framework_code,
                'name' => $name,
                'slug' => $slug,
                'display_order' => $this->currentRow,
                'version' => $row['version'] ?? $existing->version,
                'framework_family' => $row['framework_family'] ?? $existing->framework_family,
                'category' => $row['category'] ?? $existing->category,
                'publisher' => $row['publisher'] ?? $existing->publisher,
                'region' => $row['region'] ?? $existing->region,
                'industry' => $row['industry'] ?? $existing->industry,
                'framework_type' => $row['framework_type'] ?? $existing->framework_type,
                'related_domains' => $row['related_domains'] ?? $existing->related_domains,
                'purpose_objective' => $purposeObjective ?? $existing->purpose_objective,
                'description' => $description ?? $existing->description,
                'scope' => $scope ?? $existing->scope,
                'key_focus_areas' => $keyFocusAreas ?? $existing->key_focus_areas,
                'structure_domains' => $structureDomains ?? $existing->structure_domains,
                'certification_assessment' => $certificationAssessment ?? $existing->certification_assessment,
                'related_frameworks' => $relatedFrameworks ?? $existing->related_frameworks,
                'official_source_url' => $officialSourceUrl ?? $existing->official_source_url,
            ]);

            $this->updatedCount++;
            return null;
        }

        /*
        |--------------------------------------------------------------------------
        | Generate Base Slug for new record
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while (Framework::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $this->createdCount++;

        /*
        |--------------------------------------------------------------------------
        | Create New Framework
        |--------------------------------------------------------------------------
        */

        $purposeObjective = $row['purpose_objective'] ?? ($row['purpose'] ?? ($row['objective'] ?? null));
        $description = $row['overview_description'] ?? ($row['description'] ?? ($row['overview'] ?? null));
        $scope = $row['scope'] ?? null;
        $keyFocusAreas = $row['key_focus_areas'] ?? ($row['key_focus'] ?? null);
        $structureDomains = $row['structure_domains'] ?? ($row['structure'] ?? null);
        $certificationAssessment = $row['certification_assessment'] ?? ($row['certification'] ?? null);
        $relatedFrameworks = $row['related_frameworks'] ?? null;
        $officialSourceUrl = $row['official_source_url'] ?? ($row['official_source'] ?? ($row['url'] ?? null));

        return new Framework([
            'framework_id' => $frameworkId,
            'framework_code' => $frameworkCode,
            'name' => $name,
            'slug' => $slug,
            'display_order' => $this->currentRow,
            'version' => $row['version'] ?? null,
            'framework_family' => $row['framework_family'] ?? null,
            'category' => $row['category'] ?? null,
            'publisher' => $row['publisher'] ?? null,
            'region' => $row['region'] ?? null,
            'industry' => $row['industry'] ?? null,
            'framework_type' => $row['framework_type'] ?? null,
            'related_domains' => $row['related_domains'] ?? null,
            'purpose_objective' => $purposeObjective,
            'description' => $description,
            'scope' => $scope,
            'key_focus_areas' => $keyFocusAreas,
            'structure_domains' => $structureDomains,
            'certification_assessment' => $certificationAssessment,
            'related_frameworks' => $relatedFrameworks,
            'official_source_url' => $officialSourceUrl,
        ]);
    }
}