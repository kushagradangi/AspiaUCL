<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('framework_templates', function (Blueprint $table) {
            $table->string('framework_type')->nullable()->after('name');
        });
    }

    public function down(): void
    {
        Schema::table('framework_templates', function (Blueprint $table) {
            $table->dropColumn('framework_type');
        });
    }
};
