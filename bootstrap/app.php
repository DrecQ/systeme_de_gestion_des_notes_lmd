<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Exceptions\Handler as ExceptionsHandler;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as MaintenanceMiddleware;

return Application::make(basePath: dirname(__DIR__))
    ->withRouting([
        'web' => base_path('routes/web.php'),
        'console' => base_path('routes/console.php'),
    ])
    ->withHealthCheck('/up')
    ->withMiddleware(function ($middleware) {
        $middleware->add(MaintenanceMiddleware::class);
    })
    ->withExceptions(function ($exceptions) {
        $exceptions->useHandler(ExceptionsHandler::class);
    })
    ->create();
