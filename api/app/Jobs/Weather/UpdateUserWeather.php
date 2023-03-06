<?php

namespace App\Jobs\Weather;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Repositories\UserRepository;
use App\Repositories\UserWeatherRepository;
use App\Modules\Weather\Facades\Weather;
use App\Events\Weather\UserWeatherUpdated;


class UpdateUserWeather implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(UserRepository $user_repository,UserWeatherRepository $user_weather_repository): void
    {
        
        $data = Weather::getCurrentWeatherByCoordinates($this->user->longitude,$this->user->latitude);
        if(isset($data->weather) && !empty($data->weather)){
            $weather_details = $user_weather_repository->update([
                'id' => $this->user->id,
                'description' => $data->weather[0]['main'] ?? null,
                'wind' => $data->wind['speed'] ?? null,
                'temperature' => $data->main['temp'] ?? null,
            ]);
            $this->user->weather_details = $weather_details;
            event(new UserWeatherUpdated($this->user));
        }
        
    }
}
