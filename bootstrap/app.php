<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $trustedProxies = env('TRUSTED_PROXIES');
        if ($trustedProxies !== null && $trustedProxies !== '') {
            $middleware->trustProxies(
                at: array_map('trim', explode(',', $trustedProxies)),
                headers: \Illuminate\Http\Request::HEADER_X_FORWARDED_FOR |
                         \Illuminate\Http\Request::HEADER_X_FORWARDED_HOST |
                         \Illuminate\Http\Request::HEADER_X_FORWARDED_PORT |
                         \Illuminate\Http\Request::HEADER_X_FORWARDED_PROTO |
                         \Illuminate\Http\Request::HEADER_X_FORWARDED_AWS_ELB
            );
        }

        $middleware->append(\App\Http\Middleware\SecurityHeaders::class);

        $middleware->alias([
            'api.client.whitelist' => \App\Http\Middleware\EnsureApiClientIpIsWhitelisted::class,
            'admin'                => \App\Http\Middleware\EnsureUserIsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
