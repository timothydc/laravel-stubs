<?php
declare(strict_types=1);

namespace TimothyDC\LaravelStubs;

use Illuminate\Support\ServiceProvider;
use TimothyDC\LaravelStubs\Console\Commands\MakeActionCommand;

class LaravelStubsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'timothydc');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'timothydc');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

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
        $this->mergeConfigFrom(__DIR__ . '/../config/laravelstubs.php', 'laravelstubs');

        // Register the service the package provides.
        $this->app->singleton('laravelstubs', function ($app) {
            return new LaravelStubs;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelstubs'];
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
            __DIR__ . '/../config/laravelstubs.php' => config_path('laravelstubs.php'),
        ], 'laravelstubs.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/timothydc'),
        ], 'laravelstubs.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/timothydc'),
        ], 'laravelstubs.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/timothydc'),
        ], 'laravelstubs.views');*/

        // Registering package commands.
        $this->commands([
            MakeActionCommand::class
        ]);
    }
}
