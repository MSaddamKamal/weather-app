<?php

namespace App\Modules\Weather\Managers;


use App\Modules\Weather\Contracts\WeatherInterface;
use Illuminate\Support\Manager;
use App\Modules\Weather\Services\OpenWeatherService; 

class WeatherManager extends Manager
{
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver():string
    {
        return config('weather.default') ?? 'openWeather';
    }


    /**
     * @return WeatherInterface
     */
    public function createOpenWeatherDriver(): WeatherInterface
    {
        return new OpenWeatherService();
    }
}