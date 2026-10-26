<?php

namespace App\Imports;

use App\Models\Control;
use App\Models\Domain;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithColumnLimit;
use Maatwebsite\Excel\Concerns\WithReadFilter;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class ControlColumnFilter implements IReadFilter
{
    private int $maxColIndex;

    public function __construct(int $maxColIndex = 30)
    {
        $this->maxColIndex = $maxColIndex;
    }

    public function readCell(string $columnAddress, int $row, string $worksheetName = ''): bool
    {
        return Coordinate::columnIndexFromString($columnAddress) <= $this->maxColIndex;
    }
}

class ControlImport implements ToCollection, WithColumnLimit, WithReadFilter
{
    private int $createdCount = 0;
    private int $updatedCount = 0;

    public function getCreatedCount(): int
    {
        return $this->createdCount;
    }

    public function getUpdatedCount(): int
    {
        return $this->updatedCount;
    }

    /**
     * Read up to column 30 (AD) to avoid reading phantom empty columns.
     */
    public function endColumn(): string
    {
        return 'AD';
    }

    /**
     * Filter cell allocation in PhpSpreadsheet to conserve memory.
     */
    public function readFilter(): IReadFilter
    {
        return new ControlColumnFilter(30);
    }

    /**
     * Process the entire collection of rows.
     */
    public function collection(Collection $rows): void
    {
        if ($rows->isEmpty()) {
            return;
        }

        // Increase limits for large spreadsheets
        if (function_exists('set_time_limit')) {
            @set_time_limit(600);
        }
        @ini_set('memory_limit', '512M');

        // Preload all domains into memory for O(1) matching
        $domains = Domain::all();
        $domainByCode = [];
        $domainByName = [];
        $domainById   = [];

        foreach ($domains as $d) {
            if (!empty($d->domain_code)) {
                $domainByCode[strtoupper(trim((string)$d->domain_code))] = $d;
            }
            if (!empty($d->name)) {
                $domainByName[strtolower(trim((string)$d->name))] = $d;
            }
            if (!empty($d->domain_id)) {
                $domainById[strtoupper(trim((string)$d->domain_id))] = $d;
            }
        }

        // Preload existing controls by uppercase control_id
        $existingControls = Control::all()->keyBy(fn ($c) => strtoupper(trim((string)$c->control_id)));

        // Preload existing slugs for fast O(1) in-memory uniqueness
        $usedSlugs = DB::table('controls')->whereNotNull('slug')->pluck('slug')->flip()->toArray();

        // Synonyms for flexible header detection
        $fieldSynonyms = [
            'control_id' => [
                'control_id', 'controlid', 'control_code', 'ctrl_id', 'id', 'control_no', 'control_num', 'control_number'
            ],
            'domain_code' => [
                'domain_code', 'domaincode', 'domain', 'domain_id', 'domain_name', 'dom_code', 'domain_title'
            ],
            'name' => [
                'name', 'control_name', 'controlname', 'title', 'control_title', 'control'
            ],
            'business_description' => [
                'business_description', 'businessdescription', 'description', 'control_description', 'business_desc'
            ],
            'business_objective' => [
                'business_objective', 'businessobjective', 'objective', 'objectives', 'control_objective'
            ],
            'business_owner' => [
                'business_owner', 'businessowner', 'owner', 'control_owner', 'typical_owner'
            ],
            'control_category' => [
                'control_category', 'controlcategory', 'category'
            ],
            'criticality' => [
                'criticality', 'priority', 'severity'
            ],
            'applicable_industries' => [
                'applicable_industries', 'applicableindustries', 'industries', 'industry'
            ],
            'applicable_technologies' => [
                'applicable_technologies', 'applicabletechnologies', 'technologies', 'technology'
            ],
            'status' => [
                'status', 'control_status', 'state'
            ],
            'version' => [
                'version', 'ver', 'v'
            ],
            'control_summary' => [
                'control_summary', 'controlsummary', 'summary'
            ],
            'business_benefits' => [
                'business_benefits', 'businessbenefits', 'benefits', 'benefit'
            ],
            'business_risks_if_missing' => [
                'business_risks_if_missing', 'businessrisksifmissing', 'business_risks', 'risks_if_missing', 'risks', 'risk'
            ],
            'primary_stakeholders' => [
                'primary_stakeholders', 'primarystakeholders', 'stakeholders', 'stakeholder'
            ],
            'control_nature' => [
                'control_nature', 'controlnature', 'nature'
            ],
            'compensating_control' => [
                'compensating_control', 'compensatingcontrol', 'compensating_controls', 'compensating'
            ],
        ];

        // Standard index fallback if no header or key is matched
        $defaultIndexes = [
            'control_id'                => 0,
            'domain_code'               => 1,
            'name'                      => 2,
            'business_description'      => 3,
            'business_objective'        => 4,
            'business_owner'            => 5,
            'control_category'          => 6,
            'criticality'               => 7,
            'applicable_industries'     => 8,
            'applicable_technologies'   => 9,
            'status'                    => 10,
            'version'                   => 11,
            'control_summary'           => 12,
            'business_benefits'         => 13,
            'business_risks_if_missing' => 14,
            'primary_stakeholders'      => 15,
            'control_nature'            => 16,
            'compensating_control'      => 17,
        ];

        // 1. Detect if row 0 is a header row
        $firstRow = $rows->first();
        $firstRowArray = $firstRow instanceof Collection ? $firstRow->toArray() : (array) $firstRow;

        $hasHeader = false;
        $headerMap = []; // [colIndex => fieldName]

        foreach ($firstRowArray as $colIndex => $cellVal) {
            if ($cellVal === null || $cellVal === '') continue;
            $normalizedVal = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '_', (string) $cellVal), '_'));
            foreach ($fieldSynonyms as $field => $synonyms) {
                if (in_array($normalizedVal, $synonyms, true)) {
                    $headerMap[$colIndex] = $field;
                    $hasHeader = true;
                    break;
                }
            }
        }

        // If row 0 contains recognized headers, start data from index 1; otherwise treat index 0 as data
        $dataRows = $hasHeader ? $rows->slice(1) : $rows;

        $currentRow = (int) Control::max('display_order') ?: 0;

        DB::transaction(function () use (
            $dataRows,
            $hasHeader,
            $headerMap,
            $defaultIndexes,
            $fieldSynonyms,
            &$domainByCode,
            &$domainByName,
            &$domainById,
            &$existingControls,
            &$usedSlugs,
            &$currentRow
        ) {
            foreach ($dataRows as $row) {
                $rowArray = $row instanceof Collection ? $row->toArray() : (array) $row;
                $rowValues = array_values($rowArray);

                // Skip completely blank rows
                $hasContent = false;
                foreach ($rowValues as $v) {
                    if ($v !== null && trim((string)$v) !== '') {
                        $hasContent = true;
                        break;
                    }
                }
                if (!$hasContent) {
                    continue;
                }

                // Field value extractor
                $getField = function ($fieldName) use ($rowArray, $rowValues, $hasHeader, $headerMap, $defaultIndexes, $fieldSynonyms) {
                    // 1. Check mapped header columns if headers were detected
                    if ($hasHeader) {
                        foreach ($headerMap as $cIndex => $mappedField) {
                            if ($mappedField === $fieldName && isset($rowValues[$cIndex])) {
                                $v = trim((string) $rowValues[$cIndex]);
                                if ($v !== '') return $v;
                            }
                        }
                    }

                    // 2. Check associative keys (if row is associative collection)
                    $synonyms = $fieldSynonyms[$fieldName] ?? [$fieldName];
                    foreach ($rowArray as $k => $v) {
                        $normK = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '_', (string) $k), '_'));
                        if (in_array($normK, $synonyms, true)) {
                            $val = trim((string) $v);
                            if ($val !== '') return $val;
                        }
                    }

                    // 3. Fallback to default index
                    $defIdx = $defaultIndexes[$fieldName] ?? null;
                    if ($defIdx !== null && isset($rowValues[$defIdx])) {
                        $v = trim((string) $rowValues[$defIdx]);
                        return $v !== '' ? $v : null;
                    }

                    return null;
                };

                $controlId = $getField('control_id');
                $name      = $getField('name');

                // If control_id is empty, check if column 0 or 1 contains it
                if (empty($controlId) && isset($rowValues[0]) && trim((string)$rowValues[0]) !== '') {
                    $firstVal = trim((string)$rowValues[0]);
                    // If firstVal is numeric (like serial no 1, 2, 3), and column 1 has text/id
                    if (is_numeric($firstVal) && isset($rowValues[1]) && trim((string)$rowValues[1]) !== '') {
                        $controlId = trim((string)$rowValues[1]);
                        if (empty($name) && isset($rowValues[2])) {
                            $name = trim((string)$rowValues[2]);
                        }
                    } else {
                        $controlId = $firstVal;
                    }
                }

                if (empty($controlId)) {
                    continue;
                }

                if (empty($name)) {
                    $name = $controlId;
                }

                // Resolve domain
                $domainVal = $getField('domain_code');
                $domain = null;

                if (!empty($domainVal)) {
                    $upperVal = strtoupper(trim((string)$domainVal));
                    $lowerVal = strtolower(trim((string)$domainVal));

                    if (isset($domainByCode[$upperVal])) {
                        $domain = $domainByCode[$upperVal];
                    } elseif (isset($domainByName[$lowerVal])) {
                        $domain = $domainByName[$lowerVal];
                    } elseif (isset($domainById[$upperVal])) {
                        $domain = $domainById[$upperVal];
                    }
                }

                // If domain not found, try extracting domain prefix from control_id (e.g. GOV from GOV-001)
                $prefix = null;
                if (!$domain) {
                    if (preg_match('/^([A-Za-z0-9]+)[-_]/', $controlId, $m)) {
                        $prefix = strtoupper($m[1]);
                        if (isset($domainByCode[$prefix])) {
                            $domain = $domainByCode[$prefix];
                        }
                    }
                }

                // If still not found, check partial name match
                if (!$domain && !empty($domainVal)) {
                    foreach ($domainByName as $n => $d) {
                        if (str_contains($n, strtolower(trim($domainVal))) || str_contains(strtolower(trim($domainVal)), $n)) {
                            $domain = $d;
                            break;
                        }
                    }
                }

                // Fallback: create domain or find/use fallback
                if (!$domain) {
                    $codeToUse = $prefix ?: (!empty($domainVal) ? strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $domainVal), 0, 8)) : 'GEN');
                    if (empty($codeToUse)) $codeToUse = 'GEN';

                    $nameToUse = !empty($domainVal) ? trim((string)$domainVal) : ($prefix ?: 'General');

                    // Check if domain code exists in DB
                    $domain = Domain::where('domain_code', $codeToUse)->first();
                    if (!$domain) {
                        $domain = Domain::create([
                            'domain_code' => $codeToUse,
                            'domain_id'   => 'DOM-' . $codeToUse,
                            'name'        => $nameToUse,
                            'slug'        => Str::slug($nameToUse ?: $codeToUse),
                        ]);
                        $domainByCode[strtoupper($codeToUse)] = $domain;
                        $domainByName[strtolower($nameToUse)] = $domain;
                    }
                }

                $domainCode = $domain->domain_code ?? ($domainVal ?: ($prefix ?: 'GEN'));

                $currentRow++;

                // Slug generation
                $baseSlug = Str::slug($name);
                if (empty($baseSlug)) {
                    $baseSlug = Str::slug($controlId ?: 'control');
                }
                $slug = $baseSlug;
                $slugCounter = 1;
                while (isset($usedSlugs[$slug])) {
                    $slug = $baseSlug . '-' . $slugCounter;
                    $slugCounter++;
                }

                // Attributes
                $attributes = [
                    'domain_id'                 => $domain->id,
                    'control_id'                => $controlId,
                    'domain_code'               => $domainCode,
                    'name'                      => $name,
                    'display_order'             => $currentRow,
                    'business_description'      => $getField('business_description'),
                    'business_objective'        => $getField('business_objective'),
                    'business_owner'            => $getField('business_owner'),
                    'control_category'          => $getField('control_category'),
                    'criticality'               => $getField('criticality'),
                    'applicable_industries'     => $getField('applicable_industries'),
                    'applicable_technologies'   => $getField('applicable_technologies'),
                    'status'                    => $getField('status') ?: 'Active',
                    'version'                   => $getField('version'),
                    'control_summary'           => $getField('control_summary'),
                    'business_benefits'         => $getField('business_benefits'),
                    'business_risks_if_missing' => $getField('business_risks_if_missing'),
                    'primary_stakeholders'      => $getField('primary_stakeholders'),
                    'control_nature'            => $getField('control_nature'),
                    'compensating_control'      => $getField('compensating_control'),
                ];

                $ctrlIdUpper = strtoupper($controlId);
                if (isset($existingControls[$ctrlIdUpper])) {
                    $existing = $existingControls[$ctrlIdUpper];
                    if (!empty($existing->slug)) {
                        $attributes['slug'] = $existing->slug;
                    } else {
                        $attributes['slug'] = $slug;
                        $usedSlugs[$slug] = true;
                    }
                    $existing->update($attributes);
                    $this->updatedCount++;
                } else {
                    $attributes['slug'] = $slug;
                    $usedSlugs[$slug] = true;
                    $newControl = Control::create($attributes);
                    $existingControls[$ctrlIdUpper] = $newControl;
                    $this->createdCount++;
                }
            }
        });
    }
}