<?php

namespace App\Modules\Weather\Facades;
use Illuminate\Support\Facades\Facade;

class Weather extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor():string
    {
        return 'weather';
    }
}