<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FightResource extends JsonResource
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
            'user_id' => $this->user_id,
            'fight_detail' => $this->fightDetail
        ];
    }
    
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
