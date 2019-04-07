<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LatestFightResource extends JsonResource
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
            'id' => $this->id,
            'robot_1_name' => $this->fightDetail[0]->robot->name,
            'robot_2_name' => $this->fightDetail[1]->robot->name,
            'winner_robot_name' =>  $this->fightDetail[0]->robot->result == 1 ? $this->fightDetail[0]->robot->name : $this->fightDetail[1]->robot->name,
        ];
    }
    
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
