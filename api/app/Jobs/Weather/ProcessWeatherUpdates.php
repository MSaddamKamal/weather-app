<?php

namespace App\Jobs\Weather;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Repositories\UserRepository;
use App\Jobs\Weather\UpdateUserWeather;

class ProcessWeatherUpdates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(UserRepository $user_repository): void
    {
        $users =  $user_repository->findByAll()['data'];
        foreach($users as $key => $user){
            UpdateUserWeather::dispatch($user);
        }
    }
}
