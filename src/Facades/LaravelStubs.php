<?php
declare(strict_types=1);

namespace TimothyDC\LaravelStubs\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelStubs extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-stubs';
    }
}
