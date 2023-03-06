<?php

namespace App\Modules\Weather\Services;

use App\Modules\Weather\Contracts\WeatherInterface;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


class OpenWeatherService implements WeatherInterface
{

    private $appId;

    /**
     * Create an instance of OpenWeatherService
     *
     */
    public function __construct()
    {
        $this->appId = config('services.openweather.app_id');
    }


    /**
     * @param $longitude
     * @param $latitude
     * @return array
     */
    public function getCurrentWeatherByCoordinates($longitude,$latitude): object
    {
        try{                
            $response = Http::get(config('services.openweather.base_url').'weather', [
                'lat' => $latitude,
                'lon' => $longitude,
                'appid' => $this->appId,
                'units'=>'metric'
            ]);

            if($response->successful()){
                $response = (object) $response->json();
                return $response;
            }   
        }
        catch(\Exception $e) {
            return new \stdClass();
        }
        return new \stdClass();
    }

}