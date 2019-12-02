<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Locales Configuration
    |--------------------------------------------------------------------------
    |
    | The list of locales that are supported by the application.
    |
    */

    'supported' => [
        'en',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The default locale of the application.
    |
    */

    'default' => config('app.fallback_locale', 'en'),
];
