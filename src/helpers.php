<?php

if (! function_exists('locales')) {
    /**
     * Retrieve the supported locales of the application.
     *
     * @return array
     */
    function locales() : array
    {
        return config('app.locales') ?? config('locales.supported');
    }
}

if (! function_exists('locale')) {
    /**
     * Retrieve the current locale of the application.
     *
     * @param  string  $locale
     * @return string
     */
    function locale(string $locale = null) : string
    {
        if (! is_null($locale) && in_array($locale, locales())) {
            app()->setLocale($locale);
        }

        return app()->getLocale();
    }
}
