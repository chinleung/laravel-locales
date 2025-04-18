<?php

namespace ChinLeung\LaravelLocales\Macros;

use Closure;

class AppMacros
{
    /**
     * Retrieve the supported locales of the application.
     */
    public function getLocales(?array $locales = null): Closure
    {
        return function () use ($locales) {
            if (! is_null($locales)) {
                config([
                    'app.locales' => $locales,
                    'locales.supported' => $locales,
                ]);
            }

            $locales = config('app.locales') ?? config('locales.supported');

            return isset($locales[0]) ? $locales : array_keys($locales);
        };
    }
}
