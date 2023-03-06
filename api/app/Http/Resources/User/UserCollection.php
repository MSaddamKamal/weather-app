<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'data' => collect($this->collection['data'])->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'email' => $item->email,
                    'latitude' => $item->latitude,
                    'longitude' => $item->longitude,
                    'weather_details' => $item->weather_details ?? null

                ];
            }),
            'pagination' => !empty($this->collection['pagination'])?$this->collection['pagination']:false,
            'message' => 'Success'
        ];
    }
}
