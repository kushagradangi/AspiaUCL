<?php

namespace App\Imports;

use App\Models\Framework;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FrameworkImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        /*
        |--------------------------------------------------------------------------
        | Framework Name
        |--------------------------------------------------------------------------
        */

        $name = $row['framework_name'] ?? null;
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

        /*
        |--------------------------------------------------------------------------
        | Skip duplicate records
        |--------------------------------------------------------------------------
        */

        $exists = Framework::where('framework_id', $frameworkId)
            ->orWhere('name', $name)
            ->when($frameworkCode, function ($q) use ($frameworkCode) {
                return $q->orWhere('framework_code', $frameworkCode);
            })
            ->exists();

        if ($exists) {
            $currentCount = session('import_duplicates_count', 0);
            session(['import_duplicates_count' => $currentCount + 1]);
            return null;
        }


        /*
        |--------------------------------------------------------------------------
        | Generate Base Slug
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($name);

        $slug = $baseSlug;

        $counter = 1;


        /*
        |--------------------------------------------------------------------------
        | Make Slug Unique
        |--------------------------------------------------------------------------
        */

        while (
            Framework::where('slug', $slug)->exists()
        ) {

            $slug =
                $baseSlug .
                '-' .
                $counter;

            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | Create Framework
        |--------------------------------------------------------------------------
        */

        return new Framework([

            'framework_id' =>
                $row['framework_id'] ?? null,

            'framework_code' =>
                $row['framework_code'] ?? null,

            'name' =>
                $name,

            'slug' =>
                $slug,

            'version' =>
                $row['version'] ?? null,

            'framework_family' =>
                $row['framework_family'] ?? null,

            'category' =>
                $row['category'] ?? null,

            'publisher' =>
                $row['publisher'] ?? null,

            'region' =>
                $row['region'] ?? null,

            'industry' =>
                $row['industry'] ?? null,

            'framework_type' =>
                $row['framework_type'] ?? null,

        ]);
    }
}