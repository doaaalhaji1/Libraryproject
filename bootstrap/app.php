<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\EmployeeMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use App\Http\Middleware\RoleRedirect;
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
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            LanguageMiddleware::class,

        ]);
        $middleware->alias([
            'ApiCheckRole'=> \App\Http\Middleware\ApiEmployeeMiddleware::class,
            'role.redirect' =>RoleRedirect::class,
            'chekrole'=>EmployeeMiddleware::class

        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
