<?php

namespace App\Helpers;

use App\Contracts\FightInterface;
use App\Exceptions\FightService\RobotFightConflictException;

class FightRobotsStatus implements FightInterface
{
    /**
     * The Fight Service instance.
     *
     * @var RobotIds
     */
    protected $robotIds;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(array $robotIds = null)
    {
        $this->robotIds = $robotIds;
    }

    /**
     * Start Robot fight.
     *
     * @param array $robotIds
     * @throws \App\Exceptions\FightService\RobotFightConflictException
     * @return bool
     */
    public function validate() : bool
    {
        if ($this->robotIds['contestant_robot_id'] == $this->robotIds['opponent_robot_id']) 
        {
            throw new RobotFightConflictException(__('robot.message_robot_duplicate'));
        }

        return true;
    }
}
