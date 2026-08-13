<?php

namespace App\Imports;

use App\Models\Domain;
use App\Models\Framework;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DomainImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['name']) || empty($row['framework'])) {
            return null;
        }

        $framework = Framework::where('name', $row['framework'])->first();

        if (!$framework) {
            return null;
        }

        return new Domain([
            'framework_id' => $framework->id,
            'name' => $row['name'],
            'description' => $row['description'] ?? null,
        ]);
    }
}