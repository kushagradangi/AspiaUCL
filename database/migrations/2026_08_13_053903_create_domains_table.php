<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('domains', function (Blueprint $table) {

            $table->id();

            // Domain ID
            $table->string('domain_id')->unique();

            // Domain Code
            $table->string('domain_code')->nullable();

            // Domain Name
            $table->string('name');

            // Slug
            $table->string('slug')->nullable();

            // Purpose
            $table->text('purpose')->nullable();

            // Scope
            $table->text('scope')->nullable();

            // Business Owner
            $table->string('business_owner')->nullable();

            // Applicable Industries #1
            $table->longText('applicable_industries')->nullable();

            // Applicable Technologies #1
            $table->longText('applicable_technologies')->nullable();

            // Description
            $table->longText('description')->nullable();

            // Display Order
            $table->unsignedInteger('display_order')->default(0);

            // Status
            $table->string('status')->default('Active');

            // Version
            $table->string('version')->nullable();

            // Domain Name #2
            $table->string('domain_name')->nullable();

            // Short Overview
            $table->longText('short_overview')->nullable();

            // Business Objectives #1
            $table->longText('business_objectives')->nullable();

            // Business Objectives #2
            $table->longText('business_objectives_2')->nullable();

            // Business Risks
            $table->longText('business_risks')->nullable();

            // Key Capabilities
            $table->longText('key_capabilities')->nullable();

            // Typical Stakeholders
            $table->longText('typical_stakeholders')->nullable();

            // Applicable Industries #2
            $table->longText('applicable_industries_2')->nullable();

            // Applicable Technologies #2
            $table->longText('applicable_technologies_2')->nullable();

            // Keywords
            $table->longText('keywords')->nullable();

            // Tags
            $table->longText('tags')->nullable();

            // Why This Domain Matters
            $table->longText('why_domain_matters')->nullable();

            // Common Challenges
            $table->longText('common_challenges')->nullable();

            // Related Domains
            $table->longText('related_domains')->nullable();

            // Related Frameworks
            $table->longText('related_frameworks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};