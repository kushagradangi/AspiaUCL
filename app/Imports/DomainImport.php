<?php

namespace App\Imports;

use App\Models\Domain;
use App\Models\Framework;
use App\Services\RelationshipResolver;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterImport;

class DomainImport implements ToCollection, WithEvents
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
     * Process the entire collection of rows.
     */
    public function collection(Collection $rows): void
    {
        if ($rows->isEmpty()) {
            return;
        }

        if (function_exists('set_time_limit')) {
            @set_time_limit(600);
        }
        @ini_set('memory_limit', '512M');

        // Preload all frameworks into memory for fast O(1) matching
        $allFrameworks = Framework::all();
        $fwByCode = [];
        $fwByName = [];
        $fwById   = [];
        $fwByPk   = [];
        $fwBySlug = [];

        foreach ($allFrameworks as $fw) {
            if (!empty($fw->framework_code)) {
                $fwByCode[strtoupper(trim((string)$fw->framework_code))] = $fw;
            }
            if (!empty($fw->framework_id)) {
                $fwById[strtoupper(trim((string)$fw->framework_id))] = $fw;
            }
            if (!empty($fw->name)) {
                $fwByName[strtoupper(trim((string)$fw->name))] = $fw;
                $normN = strtolower(trim(preg_replace('/[^a-z0-9]+/i', ' ', (string)$fw->name)));
                $fwByName[$normN] = $fw;
            }
            if (!empty($fw->slug)) {
                $fwBySlug[strtoupper(trim((string)$fw->slug))] = $fw;
                $normS = strtolower(trim(preg_replace('/[^a-z0-9]+/i', ' ', (string)$fw->slug)));
                $fwBySlug[$normS] = $fw;
            }
            $fwByPk[(string)$fw->id] = $fw;
        }

        $findFramework = function (string $reference) use ($fwByCode, $fwById, $fwByName, $fwByPk, $fwBySlug): ?Framework {
            $trimmed = trim($reference);
            if ($trimmed === '') {
                return null;
            }

            $upper = strtoupper($trimmed);
            if (isset($fwByCode[$upper])) return $fwByCode[$upper];
            if (isset($fwById[$upper]))   return $fwById[$upper];
            if (isset($fwByPk[$upper]))   return $fwByPk[$upper];
            if (isset($fwByName[$upper])) return $fwByName[$upper];
            if (isset($fwBySlug[$upper])) return $fwBySlug[$upper];

            $norm = strtolower(trim(preg_replace('/[^a-z0-9]+/i', ' ', $trimmed)));
            if (isset($fwByName[$norm])) return $fwByName[$norm];
            if (isset($fwBySlug[$norm])) return $fwBySlug[$norm];

            foreach ($fwByName as $key => $fw) {
                if (strlen($norm) >= 3 && (str_contains($key, $norm) || str_contains($norm, $key))) {
                    return $fw;
                }
            }

            return null;
        };

        // Existing domains for replace / update
        $existingDomainsById = Domain::all()->keyBy(fn ($d) => strtoupper(trim((string)$d->domain_id)));
        $existingDomainsByCode = Domain::whereNotNull('domain_code')->get()->keyBy(fn ($d) => strtoupper(trim((string)$d->domain_code)));
        $usedSlugs = Domain::pluck('slug')->filter()->map(fn ($s) => strtolower($s))->flip()->toArray();

        // Field synonyms mapping
        $fieldSynonyms = [
            'domain_id'               => ['domain_id', 'domainid', 'id'],
            'domain_code'             => ['domain_code', 'domaincode', 'code'],
            'name'                    => ['name', 'domain_name', 'domainname', 'title'],
            'slug'                    => ['slug'],
            'purpose'                 => ['purpose'],
            'scope'                   => ['scope'],
            'business_owner'          => ['business_owner', 'businessowner', 'owner'],
            'description'             => ['description', 'desc'],
            'display_order'           => ['display_order', 'displayorder', 'order'],
            'status'                  => ['status', 'state'],
            'version'                 => ['version', 'ver', 'v'],
            'short_overview'          => ['short_overview', 'shortoverview', 'overview'],
            'business_objectives'     => ['business_objectives', 'businessobjectives', 'objectives'],
            'business_risks'          => ['business_risks', 'businessrisks', 'risks'],
            'key_capabilities'        => ['key_capabilities', 'keycapabilities', 'capabilities'],
            'typical_stakeholders'    => ['typical_stakeholders', 'typicalstakeholders', 'stakeholders'],
            'applicable_industries'   => ['applicable_industries', 'applicableindustries', 'industries', 'industry'],
            'applicable_technologies' => ['applicable_technologies', 'applicabletechnologies', 'technologies', 'technology'],
            'keywords'                => ['keywords', 'keyword'],
            'tags'                    => ['tags', 'tag'],
            'why_domain_matters'      => ['why_domain_matters', 'whydomainmatters', 'why_it_matters'],
            'common_challenges'       => ['common_challenges', 'commonchallenges', 'challenges'],
            'related_domains'         => ['related_domains', 'relateddomains'],
            'related_frameworks'      => ['related_frameworks', 'relatedframeworks', 'frameworks', 'framework', 'framework_id', 'mapped_frameworks', 'framework_code'],
        ];

        $defaultIndexes = [
            'domain_id'               => 0,
            'domain_code'             => 1,
            'name'                    => 2,
            'slug'                    => 3,
            'purpose'                 => 4,
            'scope'                   => 5,
            'business_owner'          => 6,
            'description'             => 7,
            'display_order'           => 8,
            'status'                  => 9,
            'version'                 => 10,
            'short_overview'          => 11,
            'business_objectives'     => 12,
            'business_risks'          => 13,
            'key_capabilities'        => 14,
            'typical_stakeholders'    => 15,
            'applicable_industries'   => 16,
            'applicable_technologies' => 17,
            'keywords'                => 18,
            'tags'                    => 19,
            'why_domain_matters'      => 20,
            'common_challenges'       => 21,
            'related_domains'         => 22,
            'related_frameworks'      => 23,
        ];

        $firstRow = $rows->first();
        $firstRowArray = $firstRow instanceof Collection ? $firstRow->toArray() : (array) $firstRow;
        $hasHeader = false;
        $headerMap = [];

        foreach ($firstRowArray as $idx => $val) {
            $norm = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '_', (string) $val), '_'));
            foreach ($fieldSynonyms as $field => $synonyms) {
                if (in_array($norm, $synonyms, true)) {
                    $headerMap[$idx] = $field;
                    $hasHeader = true;
                    break;
                }
            }
        }

        $dataRows = $hasHeader ? $rows->slice(1) : $rows;

        $validationErrors = [];
        $recordsToProcess = [];

        foreach ($dataRows as $rowIndex => $row) {
            $rowArray = $row instanceof Collection ? $row->toArray() : (array) $row;
            $rowValues = array_values($rowArray);

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

            $getField = function ($fieldName) use ($rowArray, $rowValues, $hasHeader, $headerMap, $defaultIndexes, $fieldSynonyms) {
                if ($hasHeader) {
                    foreach ($headerMap as $cIndex => $mappedField) {
                        if ($mappedField === $fieldName && isset($rowValues[$cIndex])) {
                            $v = trim((string) $rowValues[$cIndex]);
                            if ($v !== '') return $v;
                        }
                    }
                }

                $synonyms = $fieldSynonyms[$fieldName] ?? [$fieldName];
                foreach ($rowArray as $k => $v) {
                    $normK = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '_', (string) $k), '_'));
                    if (in_array($normK, $synonyms, true)) {
                        $val = trim((string) $v);
                        if ($val !== '') return $val;
                    }
                }

                $defIdx = $defaultIndexes[$fieldName] ?? null;
                if ($defIdx !== null && isset($rowValues[$defIdx])) {
                    $v = trim((string) $rowValues[$defIdx]);
                    return $v !== '' ? $v : null;
                }

                return null;
            };

            $domainId   = $getField('domain_id');
            $domainCode = $getField('domain_code');
            $name       = $getField('name');

            if (empty($domainId) || empty($name)) {
                continue;
            }

            $excelRow = $rowIndex + 1;

            $rawFrameworks = $getField('related_frameworks');
            $matchedFrameworks = [];

            if (!empty($rawFrameworks)) {
                $tokens = preg_split('/[,;|\r\n]+/', (string) $rawFrameworks);
                foreach ($tokens as $token) {
                    $fw = $findFramework($token);
                    if ($fw && !isset($matchedFrameworks[$fw->id])) {
                        $matchedFrameworks[$fw->id] = $fw;
                    }
                }
            }

            if (empty($matchedFrameworks)) {
                $refDisplay = $rawFrameworks !== null && trim((string)$rawFrameworks) !== ''
                    ? "\"{$rawFrameworks}\""
                    : 'None provided';
                $validationErrors[] = "Row {$excelRow}: Domain \"{$name}\" ({$domainId}) references non-existent Framework(s) {$refDisplay}. At least 1 existing Framework is required.";
                continue;
            }

            $recordsToProcess[] = [
                'domainId'          => $domainId,
                'domainCode'        => $domainCode,
                'name'              => $name,
                'matchedFrameworks' => array_values($matchedFrameworks),
                'primaryFrameworkId'=> array_values($matchedFrameworks)[0]->id,
                'getField'          => $getField,
                'rawFrameworks'     => $rawFrameworks,
            ];
        }

        if (!empty($validationErrors)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'import' => $validationErrors,
            ]);
        }

        DB::transaction(function () use (
            $recordsToProcess,
            &$existingDomainsById,
            &$existingDomainsByCode,
            &$usedSlugs
        ) {
            $currentRow = Domain::max('display_order') ?? 0;

            foreach ($recordsToProcess as $rec) {
                $domainId           = $rec['domainId'];
                $domainCode         = $rec['domainCode'];
                $name               = $rec['name'];
                $matchedFrameworks  = $rec['matchedFrameworks'];
                $primaryFrameworkId = $rec['primaryFrameworkId'];
                $getField           = $rec['getField'];
                $rawFrameworks      = $rec['rawFrameworks'];

                $currentRow++;

                // Slug generation
                $customSlug = $getField('slug');
                if (!empty($customSlug)) {
                    $slug = Str::slug($customSlug);
                } else {
                    $baseSlug = Str::slug($name);
                    $slug = $baseSlug;
                    $counter = 1;
                    while (isset($usedSlugs[$slug])) {
                        $slug = $baseSlug . '-' . $counter;
                        $counter++;
                    }
                }
                $usedSlugs[$slug] = true;

                $data = [
                    'framework_id'            => $primaryFrameworkId,
                    'domain_id'               => $domainId,
                    'domain_code'             => $domainCode,
                    'name'                    => $name,
                    'slug'                    => $slug,
                    'purpose'                 => $getField('purpose'),
                    'scope'                   => $getField('scope'),
                    'business_owner'          => $getField('business_owner'),
                    'description'             => $getField('description'),
                    'display_order'           => is_numeric($getField('display_order')) ? (int) $getField('display_order') : $currentRow,
                    'status'                  => $getField('status') ?: 'Active',
                    'version'                 => $getField('version'),
                    'short_overview'          => $getField('short_overview'),
                    'business_objectives'     => $getField('business_objectives'),
                    'business_risks'          => $getField('business_risks'),
                    'key_capabilities'        => $getField('key_capabilities'),
                    'typical_stakeholders'    => $getField('typical_stakeholders'),
                    'applicable_industries'   => $getField('applicable_industries'),
                    'applicable_technologies' => $getField('applicable_technologies'),
                    'keywords'                => $getField('keywords'),
                    'tags'                    => $getField('tags'),
                    'why_domain_matters'      => $getField('why_domain_matters'),
                    'common_challenges'       => $getField('common_challenges'),
                    'related_domains'         => $getField('related_domains'),
                    'related_frameworks'      => $rawFrameworks,
                ];

                // Check existing
                $existing = null;
                $upperId = strtoupper(trim((string)$domainId));
                if (isset($existingDomainsById[$upperId])) {
                    $existing = $existingDomainsById[$upperId];
                } elseif ($domainCode && isset($existingDomainsByCode[strtoupper(trim((string)$domainCode))])) {
                    $existing = $existingDomainsByCode[strtoupper(trim((string)$domainCode))];
                }

                if ($existing) {
                    $data['slug'] = $existing->slug ?: $data['slug'];
                    $existing->update($data);
                    $existing->frameworks()->syncWithoutDetaching(collect($matchedFrameworks)->pluck('id')->all());
                    $this->updatedCount++;
                } else {
                    $domain = Domain::create($data);
                    $domain->frameworks()->syncWithoutDetaching(collect($matchedFrameworks)->pluck('id')->all());
                    $existingDomainsById[$upperId] = $domain;
                    if ($domainCode) {
                        $existingDomainsByCode[strtoupper(trim((string)$domainCode))] = $domain;
                    }
                    $this->createdCount++;
                }
            }
        });
    }
}
