<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requirement_framework_mappings', function (Blueprint $table) {
            $table->id();

            // Requirement ID (e.g. GOV-001-R005)
            $table->string('requirement_id')->index();

            // Framework Name (e.g. ISO/IEC 27001:2022, GDPR, DORA)
            $table->string('framework_name')->index();

            // Framework Code / Short Name (e.g. ISO-27001, GDPR)
            $table->string('framework_code')->nullable()->index();

            // Optional foreign key to frameworks table
            $table->foreignId('framework_id')
                ->nullable()
                ->constrained('frameworks')
                ->nullOnDelete();

            // Clause / Section Reference in the framework (e.g. "5.1, 5.3", "Art. 20(1)")
            $table->text('clause_reference')->nullable();

            $table->timestamps();

            // Unique constraint per requirement and framework
            $table->unique(['requirement_id', 'framework_name'], 'req_fw_mapping_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requirement_framework_mappings');
    }
};
