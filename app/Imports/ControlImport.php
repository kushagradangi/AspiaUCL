<?php

namespace App\Imports;

use App\Models\Control;
use App\Models\Domain;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ControlImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['name']) || empty($row['domain'])) {
            return null;
        }

        $domain = Domain::where('name', $row['domain'])->first();

        if (!$domain) {
            return null;
        }

        return new Control([
            'domain_id' => $domain->id,
            'name' => $row['name'],
            'description' => $row['description'] ?? null,
        ]);
    }
}