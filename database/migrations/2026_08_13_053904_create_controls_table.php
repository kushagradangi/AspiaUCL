<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('controls', function (Blueprint $table) {

            $table->id();

            // Relationship with Domains
            $table->foreignId('domain_id')
                ->constrained('domains')
                ->cascadeOnDelete();

            // 1. Control ID
            $table->string('control_id')->unique();

            // 2. Domain Code
            $table->string('domain_code')->nullable();

            // 3. Control Name
            $table->string('name');

            // 4. Business Description
            $table->longText('business_description')->nullable();

            // 5. Business Objective
            $table->longText('business_objective')->nullable();

            // 6. Business Owner
            $table->string('business_owner')->nullable();

            // 7. Control Category
            $table->string('control_category')->nullable();

            // 8. Criticality
            $table->string('criticality')->nullable();

            // 9. Applicable Industries
            $table->longText('applicable_industries')->nullable();

            // 10. Applicable Technologies
            $table->longText('applicable_technologies')->nullable();

            // 11. Status
            $table->string('status')->default('Active');

            // 12. Version
            $table->string('version')->nullable();

            // 13. Control Summary
            $table->longText('control_summary')->nullable();

            // 14. Business Benefits
            $table->longText('business_benefits')->nullable();

            // 15. Business Risks if Missing
            $table->longText('business_risks_if_missing')->nullable();

            // 16. Primary Stakeholders
            $table->longText('primary_stakeholders')->nullable();

            // 17. Control Type
            $table->string('control_type')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('controls');
    }
};