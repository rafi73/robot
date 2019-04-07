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
            'contestant_robot_name' => $this->contestantRobot->name,
            'opponent_robot_name' => $this->opponentRobot->name,
            'winner_robot_name' => $this->winnerRobot->name,
            'date' => $this->date,
        ];
    }
    
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
