<?php
namespace App\Http\Middleware;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckOTPSession;
use App\Http\Middleware\CheckRegistrationStep;
use App\Http\Middleware\RedirectIfAdminAuthenticatedMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
         commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register middlewares with aliases
        $middleware->alias([
            'checkRegistrationStep' => CheckRegistrationStep::class,
            'admin' => AdminMiddleware::class,
            'CheckOTPSession' => CheckOTPSession::class,
            'admin-redirect' => RedirectIfAdminAuthenticatedMiddleware::class,
            \App\Http\Middleware\Localization::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
