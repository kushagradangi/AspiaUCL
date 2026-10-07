<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('controls') && Schema::hasColumn('controls', 'control_type')) {
            Schema::table('controls', function (Blueprint $table) {
                $table->dropColumn('control_type');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('controls') && !Schema::hasColumn('controls', 'control_type')) {
            Schema::table('controls', function (Blueprint $table) {
                $table->string('control_type')->nullable()->after('primary_stakeholders');
            });
        }
    }
};
