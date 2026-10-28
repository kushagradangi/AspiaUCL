<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
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
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(3)
                ->by($request->user()?->id ?: $request->ip())
                ->response(function (Request $request, array $headers) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Too many requests. You are allowed 3 requests per minute.',
                    ], 429, $headers);
                });
        });
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
