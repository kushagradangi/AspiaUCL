<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('framework_domain')) {
            Schema::create('framework_domain', function (Blueprint $table) {
                $table->id();
                $table->foreignId('framework_id')->constrained('frameworks')->cascadeOnDelete();
                $table->foreignId('domain_id')->constrained('domains')->cascadeOnDelete();
                $table->timestamps();

                $table->unique(['framework_id', 'domain_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('framework_domain');
    }
};
