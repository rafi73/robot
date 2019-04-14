<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RobotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'speed' => $this->speed,
            'weight' => $this->weight,
            'power' => $this->power,
            'user_id' => $this->user_id
        ];
    }
    
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
