<?php

if (! function_exists('locales')) {
    /**
     * Retrieve the supported locales of the application.
     *
     * @param  array  $locales
     * @return array
     */
    function locales(array $locales = null): array
    {
        if (! is_null($locales)) {
            config([
                'app.locales' => $locales,
                'locales.supported' => $locales,
            ]);
        }

        $locales = config('app.locales') ?? config('locales.supported');

        return isset($locales[0]) ? $locales : array_keys($locales);
    }
}

if (! function_exists('locale')) {
    /**
     * Retrieve the current locale of the application.
     *
     * @param  string  $locale
     * @return string
     */
    function locale(string $locale = null): string
    {
        if (! is_null($locale) && in_array($locale, locales())) {
            app()->setLocale($locale);
        }

        return app()->getLocale();
    }
}
