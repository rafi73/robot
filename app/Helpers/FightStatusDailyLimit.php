<?php

namespace App\Helpers;

use App\FightDetail;
use App\Contracts\FightInterface;
use App\Exceptions\FightService\RobotFightConflictException;

class FightStatusDailyLimit implements FightInterface
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
        $fightDetails = FightDetail::where('date', today())
            ->whereIn('robot_id', $this->robotIds)
            ->groupBy('robot_id')
            ->selectRaw('COUNT(*) as fights, robot_id')
            ->havingRaw('fights >= 5')
            ->get();

        if(count($fightDetails) == 1)
        {
            throw new RobotFightConflictException(__('robot.message_robot_daily_fight_limit_other', [ 'robotId' => $fightDetails[0]['robot_id']]));
        }
            
        if(count($fightDetails) > 1)
        {
            throw new RobotFightConflictException(__('robot.message_robot_daily_fight_limit_both'));
        }

        return true;
    }
}
