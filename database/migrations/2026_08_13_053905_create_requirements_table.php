<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requirements', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Requirement ID
            |--------------------------------------------------------------------------
            */

            $table->string('requirement_id')->unique();


            /*
            |--------------------------------------------------------------------------
            | Control ID
            |--------------------------------------------------------------------------
            |
            | This stores the Control ID from the Excel file.
            |
            | Example:
            | GOV-001
            |
            | It is a normal string field, not a foreign key.
            |
            */

            $table->string('control_id');


            /*
            |--------------------------------------------------------------------------
            | Requirement Title
            |--------------------------------------------------------------------------
            */

            $table->string('requirement_title');


            /*
            |--------------------------------------------------------------------------
            | Requirement
            |--------------------------------------------------------------------------
            */

            $table->longText('requirement');


            /*
            |--------------------------------------------------------------------------
            | Why this Requirement Exists
            |--------------------------------------------------------------------------
            */

            $table->longText('why_requirement_exists')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Implementation Guidance
            |--------------------------------------------------------------------------
            */

            $table->longText('implementation_guidance')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Common Audit Findings
            |--------------------------------------------------------------------------
            */

            $table->longText('common_audit_findings')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Common Mistakes
            |--------------------------------------------------------------------------
            */

            $table->longText('common_mistakes')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Best Practices
            |--------------------------------------------------------------------------
            */

            $table->longText('best_practices')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Business Examples
            |--------------------------------------------------------------------------
            */

            $table->longText('business_examples')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Typical Owner
            |--------------------------------------------------------------------------
            */

            $table->string('typical_owner')
                ->nullable();


            /*
            |--------------------------------------------------------------------------
            | Timestamps
            |--------------------------------------------------------------------------
            */

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};