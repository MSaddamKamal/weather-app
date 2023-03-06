<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Weather\Facades\Weather;
use App\Http\Resources\Weather\WeatherResource;
use App\Http\Requests\Weather\ShowWeatherRequest;

class WeatherController extends Controller
{
    public function getCurrentWeatherByLatLon(ShowWeatherRequest $request){
         $data = Weather::getCurrentWeatherByCoordinates($request->lon,$request->lat);
         return new WeatherResource($data);
    }
}
