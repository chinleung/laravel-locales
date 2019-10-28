# Laravel Locales

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chinleung/laravel-locales.svg?style=flat-square)](https://packagist.org/packages/chinleung/laravel-locales)
[![Build Status](https://img.shields.io/travis/chinleung/laravel-locales/master.svg?style=flat-square)](https://travis-ci.org/chinleung/laravel-locales)
[![Quality Score](https://img.shields.io/scrutinizer/g/chinleung/laravel-locales.svg?style=flat-square)](https://scrutinizer-ci.com/g/chinleung/laravel-locales)
[![Total Downloads](https://img.shields.io/packagist/dt/chinleung/laravel-locales.svg?style=flat-square)](https://packagist.org/packages/chinleung/laravel-locales)

Add configurations and helpers to make an application support multiple locales.

## Installation

You can install the package via composer:

```bash
composer require chinleung/laravel-locales
```

## Configuration

By default, the application locales is only going to be `en`. If your application support other locales, you can either set a `app.locales` in your `config/app.php` or publish the configuration file:

``` bash
php artisan vendor:publish --provider="ChinLeung\LaravelLocales\LaravelLocalesServiceProvider" --tag="config"
```

## Helpers

### locale(string $locale = null) : string

> Retrieve or update the current locale of the application.

```php
// Alias of app()->getLocale();
locale(); // 'en'

// Alias of app()->setLocale('fr');
locale('fr'); // 'fr'
locale(); // 'fr'
```

### locales(array $locales = null) : array

> Retrieve or update the supported locales of the application.  
> Has priority for `app.locales` over `laravel-locales.supported`.

``` php
locales(); // ['en']

locales(['en', 'fr', 'zh']);
locales(); // ['en', 'fr', 'zh']

locales(['en', 'zh']);
locales(); // ['en', 'zh']
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hello@chinleung.com instead of using the issue tracker.

## Credits

- [Chin Leung](https://github.com/chinleung)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
