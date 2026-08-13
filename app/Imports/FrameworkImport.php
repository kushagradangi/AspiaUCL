<?php

namespace App\Imports;

use App\Models\Framework;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FrameworkImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Framework([

            'framework_id' => $row['framework_id'] ?? null,

            'framework_code' => $row['framework_code'] ?? null,

            'name' => $row['framework_name'] ?? null,

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