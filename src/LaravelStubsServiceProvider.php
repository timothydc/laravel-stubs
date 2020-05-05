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
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        $this->commands([
            MakeActionCommand::class
        ]);
    }
}
