<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('controls')) {
            Schema::table('controls', function (Blueprint $table) {
                if (!Schema::hasColumn('controls', 'control_nature')) {
                    $table->string('control_nature')->nullable()->after('control_type');
                }
                if (!Schema::hasColumn('controls', 'compensating_control')) {
                    $table->string('compensating_control')->nullable()->after('control_nature');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('controls')) {
            Schema::table('controls', function (Blueprint $table) {
                if (Schema::hasColumn('controls', 'control_nature')) {
                    $table->dropColumn('control_nature');
                }
                if (Schema::hasColumn('controls', 'compensating_control')) {
                    $table->dropColumn('compensating_control');
                }
            });
        }
    }
};
