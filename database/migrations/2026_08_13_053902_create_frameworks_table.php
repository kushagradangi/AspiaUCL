<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('frameworks', function (Blueprint $table) {

            $table->string('framework_id')->unique()->after('id');
            $table->string('framework_code')->nullable()->after('framework_id');
            $table->string('version')->nullable()->after('name');
            $table->string('framework_family')->nullable()->after('version');
            $table->string('category')->nullable()->after('framework_family');
            $table->string('publisher')->nullable()->after('category');
            $table->string('region')->nullable()->after('publisher');
            $table->string('industry')->nullable()->after('region');
            $table->string('framework_type')->nullable()->after('industry');

        });
    }

    public function down(): void
    {
        Schema::table('frameworks', function (Blueprint $table) {

            $table->dropColumn([
                'framework_id',
                'framework_code',
                'version',
                'framework_family',
                'category',
                'publisher',
                'region',
                'industry',
                'framework_type',
            ]);

        });
    }
};