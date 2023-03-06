<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\Weather\ProcessWeatherUpdates;

class UpdateWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync WeatherData with External Api';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        ProcessWeatherUpdates::dispatch();
    }
}
