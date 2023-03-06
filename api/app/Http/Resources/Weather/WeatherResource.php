<?php

namespace App\Http\Resources\Weather;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' =>true,
            'data' =>[
                'weather' => $this->weather[0] ?? null,
                'wind' => $this->wind ?? null,
                'temperature' => $this->main ?? null,
            ],
            'message' => 'Success'
        ];
    }
}
