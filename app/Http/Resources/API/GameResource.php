<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->title,
            "min_players" => $this->min_players,
            "max_players" => $this->max_players,
            "difficulty" => $this->difficulty,
            "time" => $this->time,
            "description" => $this->description,
            "img_url" => $this->img_url
        ];
    }
}
