<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (!\Illuminate\Support\Facades\Schema::hasTable('requirement_framework_mappings')) {
                \Illuminate\Support\Facades\Schema::create('requirement_framework_mappings', function (\Illuminate\Database\Schema\Blueprint $table) {
                    $table->id();
                    $table->string('requirement_id')->index();
                    $table->string('framework_name')->index();
                    $table->string('framework_code')->nullable()->index();
                    $table->unsignedBigInteger('framework_id')->nullable()->index();
                    $table->text('clause_reference')->nullable();
                    $table->timestamps();
                    $table->unique(['requirement_id', 'framework_name'], 'req_fw_mapping_unique');
                });
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Boot schema error: ' . $e->getMessage());
        }
    }
}
