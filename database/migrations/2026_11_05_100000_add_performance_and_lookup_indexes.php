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
        Schema::table('requirements', function (Blueprint $table) {
            $table->index('control_id', 'idx_requirements_control_id');
        });

        Schema::table('domains', function (Blueprint $table) {
            $table->index('slug', 'idx_domains_slug');
            $table->index('domain_code', 'idx_domains_domain_code');
        });

        Schema::table('controls', function (Blueprint $table) {
            $table->index('domain_code', 'idx_controls_domain_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requirements', function (Blueprint $table) {
            $table->dropIndex('idx_requirements_control_id');
        });

        Schema::table('domains', function (Blueprint $table) {
            $table->dropIndex('idx_domains_slug');
            $table->dropIndex('idx_domains_domain_code');
        });

        Schema::table('controls', function (Blueprint $table) {
            $table->dropIndex('idx_controls_domain_code');
        });
    }
};

