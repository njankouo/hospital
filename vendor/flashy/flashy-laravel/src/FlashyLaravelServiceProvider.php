<?php

namespace Flashy\FlashyLaravel;

use Illuminate\Support\ServiceProvider;

class FlashyLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('flashy.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'flashy');

        // Register the main class to use with the facade
        $this->app->singleton('flashy', function () {
            return new FlashyLaravel;
        });
    }
}
