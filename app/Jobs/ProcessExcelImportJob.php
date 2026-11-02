<?php

namespace App\Jobs;

use App\Imports\ControlImport;
use App\Imports\DomainImport;
use App\Imports\FrameworkImport;
use App\Imports\RequirementEvidenceMappingImport;
use App\Imports\RequirementFrameworkMappingImport;
use App\Imports\RequirementImport;
use App\Models\Activity;
use App\Models\User;
use App\Notifications\ImportCompletedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ProcessExcelImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Timeout for the queue worker running this job (in seconds).
     */
    public int $timeout = 1800;

    /**
     * Maximum attempts before marking job as permanently failed.
     */
    public int $tries = 1;

    public string $importType;
    public string $filePath;
    public string $originalFileName;
    public int $userId;
    public ?string $readerType;

    /**
     * Create a new job instance.
     */
    public function __construct(
        string $importType,
        string $filePath,
        string $originalFileName,
        int $userId,
        ?string $readerType = null
    ) {
        $this->importType = $importType;
        $this->filePath = $filePath;
        $this->originalFileName = $originalFileName;
        $this->userId = $userId;
        $this->readerType = $readerType;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (function_exists('set_time_limit')) {
            @set_time_limit(1800);
        }
        @ini_set('memory_limit', '1024M');

        $user = User::find($this->userId);
        $fullPath = Storage::disk('local')->path($this->filePath);

        if (!Storage::disk('local')->exists($this->filePath)) {
            Log::error("ProcessExcelImportJob: Uploaded file not found at [{$this->filePath}]");
            if ($user) {
                $user->notify(new ImportCompletedNotification(
                    status: 'error',
                    title: 'Import Failed',
                    message: "The uploaded file {$this->originalFileName} could not be located in storage.",
                    url: route('dashboard'),
                    fileName: $this->originalFileName,
                    module: $this->importType
                ));
            }
            return;
        }

        $url = route('dashboard');

        try {
            switch ($this->importType) {
                case 'control':
                    $url = route('controls.index');
                    $import = new ControlImport();
                    Excel::import($import, $fullPath, null, $this->readerType);

                    $created = $import->getCreatedCount();
                    $updated = $import->getUpdatedCount();

                    if ($created === 0 && $updated === 0) {
                        if ($user) {
                            $user->notify(new ImportCompletedNotification(
                                status: 'error',
                                title: 'Control Import Warning',
                                message: 'No valid control rows were found in the uploaded file. Please make sure the Excel file contains Control ID and Control Name columns.',
                                url: $url,
                                fileName: $this->originalFileName,
                                module: 'control'
                            ));
                        }
                        return;
                    }

                    Activity::create([
                        'user_id'     => $this->userId,
                        'module'      => 'control',
                        'action'      => 'Imported',
                        'description' => "Imported controls: {$created} created, {$updated} updated.",
                    ]);

                    if ($user) {
                        $user->notify(new ImportCompletedNotification(
                            status: 'success',
                            title: 'Controls Import Completed',
                            message: "Controls imported successfully ({$created} new added, {$updated} existing updated).",
                            url: $url,
                            fileName: $this->originalFileName,
                            module: 'control'
                        ));
                    }
                    break;

                case 'domain':
                    $url = route('domains.index');
                    $import = new DomainImport();
                    Excel::import($import, $fullPath);

                    $created = $import->getCreatedCount();
                    $updated = $import->getUpdatedCount();

                    Activity::create([
                        'user_id'     => $this->userId,
                        'module'      => 'domain',
                        'action'      => 'Imported',
                        'description' => "Imported domains: {$created} created, {$updated} updated.",
                    ]);

                    if ($user) {
                        $user->notify(new ImportCompletedNotification(
                            status: 'success',
                            title: 'Domains Import Completed',
                            message: "Domains imported successfully ({$created} new added, {$updated} existing updated).",
                            url: $url,
                            fileName: $this->originalFileName,
                            module: 'domain'
                        ));
                    }
                    break;

                case 'framework':
                    $url = route('frameworks.index');
                    $import = new FrameworkImport();
                    Excel::import($import, $fullPath);

                    $created = $import->getCreatedCount();
                    $updated = $import->getUpdatedCount();

                    Activity::create([
                        'user_id'     => $this->userId,
                        'module'      => 'framework',
                        'action'      => 'Imported',
                        'description' => "Imported frameworks: {$created} created, {$updated} updated.",
                    ]);

                    if ($user) {
                        $user->notify(new ImportCompletedNotification(
                            status: 'success',
                            title: 'Frameworks Import Completed',
                            message: "Frameworks imported successfully ({$created} new added, {$updated} existing updated).",
                            url: $url,
                            fileName: $this->originalFileName,
                            module: 'framework'
                        ));
                    }
                    break;

                case 'requirement':
                    $url = route('requirements.index');
                    $import = new RequirementImport();
                    Excel::import($import, $fullPath);

                    $created = $import->getCreatedCount();
                    $updated = $import->getUpdatedCount();

                    Activity::create([
                        'user_id'     => $this->userId,
                        'module'      => 'requirement',
                        'action'      => 'Imported',
                        'description' => "Imported requirements: {$created} created, {$updated} updated.",
                    ]);

                    if ($user) {
                        $user->notify(new ImportCompletedNotification(
                            status: 'success',
                            title: 'Requirements Import Completed',
                            message: "Requirements imported successfully ({$created} new added, {$updated} existing updated).",
                            url: $url,
                            fileName: $this->originalFileName,
                            module: 'requirement'
                        ));
                    }
                    break;

                case 'requirement_framework_mapping':
                    $url = route('requirements.index');
                    $import = new RequirementFrameworkMappingImport();
                    Excel::import($import, $fullPath);

                    $mappedRows = $import->getMappedRows();
                    $mappedPairs = $import->getMappedPairs();
                    $missingCount = $import->getMissingRequirementCount();

                    Activity::create([
                        'user_id'     => $this->userId,
                        'module'      => 'requirement',
                        'action'      => 'Imported framework mappings',
                        'description' => sprintf(
                            'Imported framework mappings for %d requirements (%d framework mappings).',
                            $mappedRows,
                            $mappedPairs
                        ),
                    ]);

                    $msg = sprintf(
                        'Framework mappings imported: %d requirements with mappings, %d framework mappings saved.',
                        $mappedRows,
                        $mappedPairs
                    );
                    if ($missingCount > 0) {
                        $msg .= sprintf(' (%d Requirement IDs were not found).', $missingCount);
                    }

                    if ($user) {
                        $user->notify(new ImportCompletedNotification(
                            status: 'success',
                            title: 'Framework Mappings Import Completed',
                            message: $msg,
                            url: $url,
                            fileName: $this->originalFileName,
                            module: 'requirement'
                        ));
                    }
                    break;

                case 'requirement_evidence_mapping':
                    $url = route('requirement-evidence-mappings.index');
                    $import = new RequirementEvidenceMappingImport();
                    Excel::import($import, $fullPath);

                    $created = $import->getCreatedCount();
                    $updated = $import->getUpdatedCount();
                    $skipped = $import->getSkippedCount();

                    Activity::create([
                        'user_id'     => $this->userId,
                        'module'      => 'requirement_evidence_mapping',
                        'action'      => 'Imported',
                        'description' => "Imported Evidence Mappings ({$created} created, {$updated} updated, {$skipped} skipped)",
                    ]);

                    $msg = "Import completed successfully! {$created} new mappings created, {$updated} updated.";
                    if ($skipped > 0) {
                        $msg .= " ({$skipped} empty rows skipped).";
                    }

                    if ($user) {
                        $user->notify(new ImportCompletedNotification(
                            status: 'success',
                            title: 'Evidence Mappings Import Completed',
                            message: $msg,
                            url: $url,
                            fileName: $this->originalFileName,
                            module: 'requirement_evidence_mapping'
                        ));
                    }
                    break;

                default:
                    throw new \InvalidArgumentException("Unknown import type: {$this->importType}");
            }
        } catch (\Throwable $e) {
            Log::error("Async Import Error [Type: {$this->importType}, File: {$this->originalFileName}]: " . $e->getMessage(), [
                'exception' => $e,
            ]);

            if ($user) {
                $user->notify(new ImportCompletedNotification(
                    status: 'error',
                    title: ucfirst(str_replace('_', ' ', $this->importType)) . ' Import Failed',
                    message: 'Error during background import: ' . Str::limit($e->getMessage(), 300),
                    url: $url,
                    fileName: $this->originalFileName,
                    module: $this->importType
                ));
            }
        } finally {
            // Delete temporary file from storage
            if (Storage::disk('local')->exists($this->filePath)) {
                Storage::disk('local')->delete($this->filePath);
            }
        }
    }
}
