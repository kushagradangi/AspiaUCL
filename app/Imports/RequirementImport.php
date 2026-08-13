<?php

namespace App\Imports;

use App\Models\Control;
use App\Models\Requirement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RequirementImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (empty($row['name']) || empty($row['control'])) {
            return null;
        }

        $control = Control::where('name', $row['control'])->first();

        if (!$control) {
            return null;
        }

        return new Requirement([
            'control_id' => $control->id,
            'name' => $row['name'],
            'description' => $row['description'] ?? null,
        ]);
    }
}