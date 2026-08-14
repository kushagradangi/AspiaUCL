<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('frameworks', function (Blueprint $table) {

            $table->id();

            $table->string('framework_id')->unique();

            $table->string('framework_code')->nullable();

            $table->string('name');

            $table->string('version')->nullable();

            $table->string('framework_family')->nullable();

            $table->string('category')->nullable();

            $table->string('publisher')->nullable();

            $table->string('region')->nullable();

            $table->string('industry')->nullable();

            $table->string('framework_type')->nullable();

            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('frameworks');
    }
};