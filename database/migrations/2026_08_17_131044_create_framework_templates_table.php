<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('framework_templates', function (Blueprint $table) {

            $table->id();

            $table->string('name')
                ->default('Default Framework Template');

            $table->longText('html_content');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('framework_templates');
    }
};