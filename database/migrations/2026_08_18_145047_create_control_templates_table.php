<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('control_templates', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->longText('html_content');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('control_templates');
    }
};