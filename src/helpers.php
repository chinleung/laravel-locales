<?php

if (! function_exists('locales')) {
    /**
     * Retrieve the supported locales of the application.
     *
     * @return array
     */
    function locales() : array
    {
        return config('app.locales') ?? config('laravel-locales.supported');
    }
}

if (! function_exists('locale')) {
    /**
     * Retrieve the current locale of the application.
     *
     * @return string
     */
    function locale() : string
    {
        return app()->getLocale();
    }
}
