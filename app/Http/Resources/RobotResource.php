<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RobotResource extends JsonResource
{
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
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
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
    
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
