<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // Middleware global...
        // \App\Http\Middleware\RoleMiddleware::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware pour le groupe web...
        ],

        'api' => [
            // Middleware pour le groupe API...
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Autres middlewares...
        // 'role' => \App\Http\Middleware\RoleMiddleware::class,
        'admin.role' => \App\Http\Middleware\AdminRole::class, 
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,

        
    ];
}
