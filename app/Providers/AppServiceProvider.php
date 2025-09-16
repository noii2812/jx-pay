<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        // Use Bootstrap 5 pagination views to match project CSS
        if (method_exists(Paginator::class, 'useBootstrapFive')) {
            Paginator::useBootstrapFive();
        } else {
            // Fallback for older Laravel versions
            Paginator::useBootstrap();
        }
        Schema::defaultStringLength(191);
    }
}
