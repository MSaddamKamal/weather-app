<?php

namespace App\Modules\Weather\Providers;

use App\Modules\Weather\Managers\WeatherManager;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('weather', function ($app) {
            return new WeatherManager($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides():array
    {
        return ['weather'];
    }
}