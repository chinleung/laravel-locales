<?php

namespace ChinLeung\LaravelLocales;

use Illuminate\Support\ServiceProvider;

class LaravelLocalesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        require __DIR__.'/helpers.php';

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('locales.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'locales');
    }
}
