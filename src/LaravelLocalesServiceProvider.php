<?php

namespace ChinLeung\LaravelLocales;

use ChinLeung\LaravelLocales\Macros\AppMacros;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class LaravelLocalesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        App::mixin(new AppMacros);

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
