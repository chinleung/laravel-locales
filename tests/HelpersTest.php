<?php

namespace ChinLeung\LaravelLocales\Tests;

use ChinLeung\LaravelLocales\LaravelLocalesServiceProvider;
use Orchestra\Testbench\TestCase;

class HelpersTest extends TestCase
{
    /**
     * The locales helper will return the list of locales.
     *
     * @test
     *
     * @return void
     */
    public function the_locales_helper_will_return_all_locales(): void
    {
        $this->assertCount(1, locales());
        $this->assertEquals(['en'], locales());
    }

    /**
     * The locales helper will take the list of locales from app.locales as a
     * priority.
     *
     * @test
     *
     * @return void
     */
    public function the_locales_helper_will_return_locales_from_app_first(): void
    {
        config(['app.locales' => ['en', 'fr']]);
        $this->assertCount(2, locales());

        config(['app.locales' => ['en', 'fr', 'zh']]);
        $this->assertCount(3, locales());
    }

    /**
     * The locale helper will retrieve the current locale of the application.
     *
     * @test
     *
     * @return void
     */
    public function the_locale_helper_will_return_the_current_active_locale(): void
    {
        $this->assertEquals(app()->getLocale(), locale());

        app()->setLocale('fr');
        $this->assertEquals('fr', locale());
    }

    /**
     * The locale helper can update the application's locale.
     *
     * @test
     *
     * @return void
     */
    public function the_locale_helper_can_update_the_application_locale(): void
    {
        $this->assertEquals('en', locale());

        config(['locales.supported' => ['en', 'fr']]);

        $this->assertEquals('fr', locale('fr'));
        $this->assertEquals('fr', locale());
    }

    /**
     * The locale helper will not update the application's locale if it's not
     * in the list of supported locales.
     *
     * @test
     *
     * @return void
     */
    public function the_locale_helper_will_not_update_if_locale_is_not_supported(): void
    {
        $this->assertEquals('en', locale());
        $this->assertEquals('en', locale('fr'));
        $this->assertEquals('en', locale());
    }

    /**
     * The locales helper can set the list of supported locales.
     *
     * @test
     *
     * @return void
     */
    public function the_locales_helper_can_update_the_list_of_supported_locales(): void
    {
        $this->assertCount(1, locales());

        locales($supported = ['en', 'fr']);

        $this->assertEquals($supported, locales());
    }

    /**
     * Retrieve the package providers of the application.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelLocalesServiceProvider::class,
        ];
    }
}
