<?php

namespace App\Modules\Weather\Contracts;

interface WeatherInterface
{
    /**
     * @param $longitude
     * @param $latitude
     * @return object
     */
    public function getCurrentWeatherByCoordinates($longitude,$latitude):object;
}