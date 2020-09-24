<?php

namespace TallAndSassy\TasUiGlances;

use Illuminate\Support\ServiceProvider;

class TasUiGlancesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     * vbump
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tassy');

        //        $this->publishes([
        //            __DIR__.'/public' => public_path('eleganttechnologies/grok'),
        //        ]);
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tallandsassy');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tallandsassy');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');
      \Livewire::component('tassy::flash', \TallAndSassy\TasUiGlances\Components\Flash\Flash::class);

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tasuiglances.php', 'tasuiglances');

        // Register the service the package provides.
        $this->app->singleton('tasuiglances', function ($app) {
            return new TasUiGlances;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['tasuiglances'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/tasuiglances.php' => config_path('tasuiglances.php'),
        ], 'tasuiglances.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/tallandsassy'),
        ], 'tasuiglances.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/tallandsassy'),
        ], 'tasuiglances.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/tallandsassy'),
        ], 'tasuiglances.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
