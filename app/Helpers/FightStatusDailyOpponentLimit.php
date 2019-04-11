<?php

namespace App\Helpers;

use App\FightDetail;
use App\Contracts\FightInterface;
use App\Exceptions\FightService\RobotFightConflictException;

class FightStatusDailyOpponentLimit implements FightInterface
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
     *
     * @throws RobotFightConflictException
     * @return bool
     */
    public function validate() : bool
    {
        $fightDetails = FightDetail::where('date', today()) 
                                ->whereIn('robot_id' , $this->robotIds)
                                ->groupBy('fight_id')
                                ->selectRaw('COUNT(*) as duplicate')
                                ->havingRaw('duplicate = 2')
                                ->exists();
        if($fightDetails)
        {
            throw new RobotFightConflictException(__('robot.message_robot_daily_fight_limit'));
        }

        return true;
    }
}
