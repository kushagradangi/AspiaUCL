<?php

namespace App\Imports;

use App\Models\Control;
use App\Models\Requirement;
use App\Models\RequirementEvidenceMapping;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithColumnLimit;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithReadFilter;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class RequirementEvidenceMappingColumnFilter implements IReadFilter
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

class RequirementEvidenceMappingImport implements ToCollection, WithHeadingRow, WithColumnLimit, WithReadFilter
{
    private int $createdCount = 0;
    private int $updatedCount = 0;
    private int $skippedCount = 0;

    public function getCreatedCount(): int
    {
        return $this->createdCount;
    }

    public function getUpdatedCount(): int
    {
        return $this->updatedCount;
    }

    public function getSkippedCount(): int
    {
        return $this->skippedCount;
    }

    public function endColumn(): string
    {
        return 'Z';
    }

    public function readFilter(): IReadFilter
    {
        return new RequirementEvidenceMappingColumnFilter(26);
    }

    public function collection(Collection $rows): void
    {
        if ($rows->isEmpty()) {
            return;
        }

        if (function_exists('set_time_limit')) {
            @set_time_limit(600);
        }
        @ini_set('memory_limit', '512M');

        // Preload requirements map for fast control_id & title resolution if needed
        $requirementsMap = Requirement::all(['requirement_id', 'control_id', 'requirement_title', 'requirement'])
            ->keyBy(fn ($r) => strtoupper(trim((string)$r->requirement_id)));

        // Preload existing evidence mappings keyed by normalized requirement_id
        $existingMappings = RequirementEvidenceMapping::all();
        $existingGrouped = [];
        foreach ($existingMappings as $mapping) {
            $key = strtoupper(trim((string)$mapping->requirement_id));
            if (!isset($existingGrouped[$key])) {
                $existingGrouped[$key] = [];
            }
            $existingGrouped[$key][] = $mapping;
        }

        $maxDisplayOrder = RequirementEvidenceMapping::max('display_order') ?? 0;

        DB::transaction(function () use ($rows, $requirementsMap, &$existingGrouped, &$maxDisplayOrder) {
            foreach ($rows as $row) {
                $rowArray = $row instanceof Collection ? $row->toArray() : (array) $row;
                $normalized = [];

                foreach ($rowArray as $k => $v) {
                    // Normalize header key: remove non-alphanumeric and lowercase
                    $cleanKey = preg_replace('/[^a-z0-9]/', '', strtolower(trim((string)$k)));
                    $normalized[$cleanKey] = is_string($v) ? trim($v) : $v;
                }

                // Resolve Requirement ID
                $reqId = $this->extractField($normalized, [
                    'requirementid', 'reqid', 'id', 'requirementcode'
                ]);

                if (empty($reqId)) {
                    $this->skippedCount++;
                    continue;
                }

                $reqIdUpper = strtoupper(trim((string)$reqId));
                $linkedRequirement = $requirementsMap[$reqIdUpper] ?? null;

                // Resolve Control ID
                $controlId = $this->extractField($normalized, [
                    'controlid', 'control', 'cid'
                ]);
                if (empty($controlId) || str_starts_with($controlId, '=') || str_contains($controlId, 'LEFT(') || str_contains($controlId, 'FIND(')) {
                    $controlId = $linkedRequirement?->control_id ?: preg_replace('/-R\d+$/i', '', $reqId);
                }

                // Resolve Requirement Title
                $title = $this->extractField($normalized, [
                    'requirementtitle', 'title', 'requirementname', 'name'
                ]) ?: $linkedRequirement?->requirement_title;

                // Resolve Requirement Statement
                $requirementStatement = $this->extractField($normalized, [
                    'requirement', 'requirementstatement', 'statement', 'description'
                ]) ?: $linkedRequirement?->requirement;

                // Resolve Evidence Specifications
                $evidenceType = $this->extractField($normalized, [
                    'evidencetype', 'typeofevidence', 'evidencetypes'
                ]);

                $evidenceOwner = $this->extractField($normalized, [
                    'evidenceowner', 'owner', 'accountableowner'
                ]);

                $evidenceReferenceLink = $this->extractField($normalized, [
                    'evidencereferencelink', 'evidencereference', 'referencelink', 'evidencelink', 'referencerepositorypath'
                ]);

                $evidenceDescription = $this->extractField($normalized, [
                    'evidencedescription', 'descriptionofevidence', 'evidencedesc'
                ]);

                $sourceSystem = $this->extractField($normalized, [
                    'sourcesystem', 'sourcesystems', 'system', 'source'
                ]);

                $frequency = $this->extractField($normalized, [
                    'frequency', 'evidencefrequency'
                ]);

                $freshness = $this->extractField($normalized, [
                    'freshness', 'evidencefreshness'
                ]);

                // Resolve Audit & Testing Procedures
                $auditorValidationMethod = $this->extractField($normalized, [
                    'auditorvalidationmethod', 'auditorvalidation', 'validationmethod'
                ]);

                $testProcedure = $this->extractField($normalized, [
                    'testprocedure', 'procedure', 'teststeps', 'testingprocedure'
                ]);

                $evidenceChecklist = $this->extractField($normalized, [
                    'evidencechecklist', 'checklist'
                ]);

                $expectedResult = $this->extractField($normalized, [
                    'expectedresult', 'expectedoutcome', 'expectedresults'
                ]);

                $passCriteria = $this->extractField($normalized, [
                    'passcriteria', 'passcriterion', 'passconditions'
                ]);

                $failCriteria = $this->extractField($normalized, [
                    'failcriteria', 'failcriterion', 'failconditions'
                ]);

                $testFrequency = $this->extractField($normalized, [
                    'testfrequency', 'testingfrequency'
                ]);

                $testMethod = $this->extractField($normalized, [
                    'testmethod', 'testingmethod'
                ]);

                $data = [
                    'requirement_id'             => $reqId,
                    'control_id'                 => $controlId,
                    'requirement_title'          => $title,
                    'requirement'                => $requirementStatement,
                    'evidence_type'              => $evidenceType,
                    'evidence_owner'             => $evidenceOwner,
                    'evidence_reference_link'    => $evidenceReferenceLink,
                    'evidence_description'       => $evidenceDescription,
                    'source_system'              => $sourceSystem,
                    'frequency'                  => $frequency,
                    'freshness'                  => $freshness,
                    'auditor_validation_method'  => $auditorValidationMethod,
                    'test_procedure'             => $testProcedure,
                    'evidence_checklist'         => $evidenceChecklist,
                    'expected_result'            => $expectedResult,
                    'pass_criteria'              => $passCriteria,
                    'fail_criteria'              => $failCriteria,
                    'test_frequency'             => $testFrequency,
                    'test_method'                => $testMethod,
                ];

                // Upsert: check if a record with the same requirement_id exists
                $existingRecord = null;
                if (!empty($existingGrouped[$reqIdUpper])) {
                    // If multiple exist, try matching by evidence_type or reference
                    foreach ($existingGrouped[$reqIdUpper] as $candidate) {
                        if ($evidenceType && strtolower(trim((string)$candidate->evidence_type)) === strtolower(trim((string)$evidenceType))) {
                            $existingRecord = $candidate;
                            break;
                        }
                    }
                    if (!$existingRecord) {
                        $existingRecord = $existingGrouped[$reqIdUpper][0];
                    }
                }

                if ($existingRecord) {
                    $existingRecord->update($data);
                    $this->updatedCount++;
                } else {
                    $maxDisplayOrder++;
                    $data['display_order'] = $maxDisplayOrder;
                    $newRecord = RequirementEvidenceMapping::create($data);
                    if (!isset($existingGrouped[$reqIdUpper])) {
                        $existingGrouped[$reqIdUpper] = [];
                    }
                    $existingGrouped[$reqIdUpper][] = $newRecord;
                    $this->createdCount++;
                }
            }
        });
    }

    /**
     * Helper to find first matching key in normalized row.
     */
    private function extractField(array $normalized, array $candidates): ?string
    {
        foreach ($candidates as $candidate) {
            if (isset($normalized[$candidate]) && $normalized[$candidate] !== '') {
                return (string) $normalized[$candidate];
            }
        }

        // Fuzzy fallback: partial substring match
        foreach ($candidates as $candidate) {
            foreach ($normalized as $k => $v) {
                if ($v !== '' && (str_contains($k, $candidate) || str_contains($candidate, $k))) {
                    return (string) $v;
                }
            }
        }

        return null;
    }
}

