<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\RobotResource;

class FightPageResource extends JsonResource
{
    private $ownedRobot;
    private $otherRobots;

    public function __construct($ownedRobot, $otherRobots)
    {
        //parent::__construct($collection);
        $this->ownedRobot = $ownedRobot;
        $this->otherRobots = $otherRobots;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'owned' => $this->ownedRobot,
            'others' => $this->otherRobots,
        ];
    }
    
    public function with($request) {
        return [
            'version' => '1.0.0'
        ];
    }
}
