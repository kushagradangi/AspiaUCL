<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requirement_evidence_mappings', function (Blueprint $table) {
            $table->id();

            // Requirement Information (Columns A - D)
            $table->string('requirement_id')->index();
            $table->string('control_id')->nullable()->index();
            $table->string('requirement_title')->nullable()->index();
            $table->longText('requirement')->nullable();

            // Evidence Specifications (Columns E - K)
            $table->text('evidence_type')->nullable();
            $table->string('evidence_owner')->nullable()->index();
            $table->text('evidence_reference_link')->nullable();
            $table->longText('evidence_description')->nullable();
            $table->text('source_system')->nullable();
            $table->string('frequency')->nullable();
            $table->text('freshness')->nullable();

            // Audit & Testing Procedures (Columns L - S)
            $table->longText('auditor_validation_method')->nullable();
            $table->longText('test_procedure')->nullable();
            $table->longText('evidence_checklist')->nullable();
            $table->longText('expected_result')->nullable();
            $table->longText('pass_criteria')->nullable();
            $table->longText('fail_criteria')->nullable();
            $table->string('test_frequency')->nullable();
            $table->text('test_method')->nullable();

            // Ordering & Meta
            $table->integer('display_order')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirement_evidence_mappings');
    }
};
