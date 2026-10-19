<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->environment('production') || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) || isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        Carbon::setLocale(config('app.locale', 'id'));

        Paginator::useBootstrapFive();

        View::composer(['*'], function ($view) {
            $view->with('siteName', setting('site_name', 'Masjid Sumpah Masigit Cilegon'));
        });
    }
}