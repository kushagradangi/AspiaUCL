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
        Schema::table('frameworks', function (Blueprint $table) {
            if (!Schema::hasColumn('frameworks', 'related_domains')) {
                $table->longText('related_domains')->nullable()->after('framework_type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('frameworks', function (Blueprint $table) {
            if (Schema::hasColumn('frameworks', 'related_domains')) {
                $table->dropColumn('related_domains');
            }
        });
    }
};
