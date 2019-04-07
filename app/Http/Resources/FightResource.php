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
            'contestant_robot_id' => $this->contestant_robot_id,
            'opponent_robot_id' => $this->opponent_robot_id,
            'contestant_robot_score' => $this->contestant_robot_score,
            'opponent_robot_score' => $this->opponent_robot_score,
            'winner_robot_id' => $this->winner_robot_id,
            'date' => $this->date,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ];
    }
    
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
