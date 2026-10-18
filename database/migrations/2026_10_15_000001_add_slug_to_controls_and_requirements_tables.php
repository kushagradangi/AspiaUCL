<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Add slug to controls table if it doesn't exist
        if (!Schema::hasColumn('controls', 'slug')) {
            Schema::table('controls', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('name')->index();
            });
        }

        // 2. Add slug to requirements table if it doesn't exist
        if (!Schema::hasColumn('requirements', 'slug')) {
            Schema::table('requirements', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('requirement_title')->index();
            });
        }

        // 3. Populate slugs for existing Controls
        $ctrlSlugs = [];
        $controls = DB::table('controls')->orderBy('id', 'asc')->get();
        foreach ($controls as $c) {
            $baseSlug = Str::slug($c->name ?? '');
            if (empty($baseSlug)) {
                $baseSlug = Str::slug($c->control_id ?? ('control-' . $c->id));
            }

            $slug = $baseSlug;
            $counter = 1;
            while (isset($ctrlSlugs[$slug])) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }
            $ctrlSlugs[$slug] = true;

            DB::table('controls')->where('id', $c->id)->update(['slug' => $slug]);
        }

        // 4. Populate slugs for existing Requirements
        $reqSlugs = [];
        $requirements = DB::table('requirements')->orderBy('id', 'asc')->get();
        foreach ($requirements as $r) {
            $baseSlug = Str::slug($r->requirement_title ?? '');
            if (empty($baseSlug)) {
                $baseSlug = Str::slug($r->requirement_id ?? ('requirement-' . $r->id));
            }

            $slug = $baseSlug;
            $counter = 1;
            while (isset($reqSlugs[$slug])) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }
            $reqSlugs[$slug] = true;

            DB::table('requirements')->where('id', $r->id)->update(['slug' => $slug]);
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('controls', 'slug')) {
            Schema::table('controls', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }

        if (Schema::hasColumn('requirements', 'slug')) {
            Schema::table('requirements', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }
};
