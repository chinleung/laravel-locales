<?php

namespace Chinleung\LaravelLocales\Tests;

use ChinLeung\LaravelLocales\LaravelLocalesServiceProvider;
use Orchestra\Testbench\TestCase;

class HelpersTest extends TestCase
{
    /**
     * The locales helper will return the list of locales.
     *
     * @test
     * @return void
     */
    public function the_locales_helper_will_return_all_locales() : void
    {
        $this->assertCount(2, locales());
    }

    /**
     * The locales helper will take the list of locales from app.locales as a
     * priority.
     *
     * @test
     * @return void
     */
    public function the_locales_helper_will_return_locales_from_app_first() : void
    {
        config(['app.locales' => ['en']]);
        $this->assertCount(1, locales());

        config(['app.locales' => ['en', 'fr', 'zh']]);
        $this->assertCount(3, locales());
    }

    /**
     * The locale helper will retrieve the current locale of the application.
     *
     * @test
     * @return void
     */
    public function the_locale_helper_will_return_the_current_active_locale() : void
    {
        $this->assertEquals(app()->getLocale(), locale());

        app()->setLocale('fr');
        $this->assertEquals('fr', locale());
    }

    /**
     * Retrieve the package providers of the application.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app) : array
    {
        return [
            LaravelLocalesServiceProvider::class,
        ];
    }
}
