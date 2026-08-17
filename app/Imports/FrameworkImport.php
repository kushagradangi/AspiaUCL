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

        /*
        |--------------------------------------------------------------------------
        | Skip empty rows
        |--------------------------------------------------------------------------
        */

        if (empty($row['framework_id']) || empty($name)) {
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