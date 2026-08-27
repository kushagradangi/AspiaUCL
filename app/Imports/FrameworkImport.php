<?php

namespace App\Imports;

use App\Models\Framework;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FrameworkImport implements ToModel, WithHeadingRow
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

    public function model(array $row)
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
        ]);
    }
}