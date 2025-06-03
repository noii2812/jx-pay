<?php

namespace App\Providers;

use App\Http\Middleware\CheckAdminGm;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::aliasMiddleware('admin.gm.check', CheckAdminGm::class);
    }
}
