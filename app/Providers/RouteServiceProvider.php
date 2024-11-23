<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Ceci est le chemin vers la page d'accueil de votre application.
     */
    public const HOME = '/home';

    /**
     * Définir vos liaisons de modèle, filtres de route, etc.
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('api')
                ->prefix('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });
    }

    /**
     * Configuration de la limitation des taux.
     */
    protected function configureRateLimiting()
    {
        // Code pour la limitation des taux
    }
}
