<?php

namespace App\Helpers;

use App\Robot;
use App\Contracts\FightInterface;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\RobotService\RobotNotFoundException;
use App\Exceptions\FightService\RobotFightConflictException;
use App\Exceptions\RobotService\RobotOwnerMismatchedException;

class FightRobotsOwnerStatus implements FightInterface
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
     * @throws \App\Exceptions\FightService\RobotFightConflictException;
     * @return bool
     */
    public function validate() : bool
    {
        $ownRobot = Robot::find($this->robotIds['contestant_robot_id']);
        if (!$ownRobot)
        {
            throw new RobotNotFoundException(__('robot.message_robot_not_found', [ 'robotId' => $this->robotIds['contestant_robot_id']]));
        }

        if($ownRobot->user_id != Auth::id())
        {
            throw new RobotOwnerMismatchedException(__('robot.message_not_your_robot'));
        }

        $otherRobot = Robot::find($this->robotIds['opponent_robot_id']);
        if (!$otherRobot)
        {
            throw new RobotNotFoundException(__('robot.message_robot_not_found', [ 'robotId' => $this->robotIds['opponent_robot_id']]));
        }

        if ($ownRobot->user_id != Auth::id() && $otherRobot->user_id != Auth::id())
        {
            throw new RobotFightConflictException(__('robot.message_wrong_robots'));
        }

        if ($ownRobot->user_id == $otherRobot->user_id)
        {
            throw new RobotFightConflictException(__('robot.message_robot_same_owner'));
        }

        return true;
    }
}
