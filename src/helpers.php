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
