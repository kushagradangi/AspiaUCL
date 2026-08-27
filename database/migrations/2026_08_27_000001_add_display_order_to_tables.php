<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('requirements') && !Schema::hasColumn('requirements', 'display_order')) {
            Schema::table('requirements', function (Blueprint $table) {
                $table->unsignedInteger('display_order')->default(0)->after('typical_owner');
            });
        }

        if (Schema::hasTable('controls') && !Schema::hasColumn('controls', 'display_order')) {
            Schema::table('controls', function (Blueprint $table) {
                $table->unsignedInteger('display_order')->default(0)->after('control_type');
            });
        }

        if (Schema::hasTable('frameworks') && !Schema::hasColumn('frameworks', 'display_order')) {
            Schema::table('frameworks', function (Blueprint $table) {
                $table->unsignedInteger('display_order')->default(0)->after('description');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('requirements') && Schema::hasColumn('requirements', 'display_order')) {
            Schema::table('requirements', function (Blueprint $table) {
                $table->dropColumn('display_order');
            });
        }

        if (Schema::hasTable('controls') && Schema::hasColumn('controls', 'display_order')) {
            Schema::table('controls', function (Blueprint $table) {
                $table->dropColumn('display_order');
            });
        }

        if (Schema::hasTable('frameworks') && Schema::hasColumn('frameworks', 'display_order')) {
            Schema::table('frameworks', function (Blueprint $table) {
                $table->dropColumn('display_order');
            });
        }
    }
};
