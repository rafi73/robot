<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopFightResource extends JsonResource
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
            'fights' => (int) $this->fights,
            'wins' => (int) $this->wins,
            'looses' => ($this->fights - $this->wins),
            'robot_name' => $this->robot->name
        ];
    }
}
