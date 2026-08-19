<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requirement_templates', function (Blueprint $table) {

            $table->id();

            $table->longText('html_content');

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('requirement_templates');
    }
};