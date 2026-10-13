<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('frameworks', function (Blueprint $table) {
            if (!Schema::hasColumn('frameworks', 'purpose_objective')) {
                $table->text('purpose_objective')->nullable()->after('related_domains');
            }
            if (!Schema::hasColumn('frameworks', 'scope')) {
                $table->text('scope')->nullable()->after('description');
            }
            if (!Schema::hasColumn('frameworks', 'key_focus_areas')) {
                $table->text('key_focus_areas')->nullable()->after('scope');
            }
            if (!Schema::hasColumn('frameworks', 'structure_domains')) {
                $table->text('structure_domains')->nullable()->after('key_focus_areas');
            }
            if (!Schema::hasColumn('frameworks', 'certification_assessment')) {
                $table->text('certification_assessment')->nullable()->after('structure_domains');
            }
            if (!Schema::hasColumn('frameworks', 'related_frameworks')) {
                $table->text('related_frameworks')->nullable()->after('certification_assessment');
            }
            if (!Schema::hasColumn('frameworks', 'official_source_url')) {
                $table->text('official_source_url')->nullable()->after('related_frameworks');
            }
        });
    }

    public function down(): void
    {
        Schema::table('frameworks', function (Blueprint $table) {
            $columns = [
                'purpose_objective',
                'scope',
                'key_focus_areas',
                'structure_domains',
                'certification_assessment',
                'related_frameworks',
                'official_source_url',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('frameworks', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
