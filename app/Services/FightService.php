<?php

namespace App\Services;

use DB;
use Exception;
use App\Robot;
use App\Fight;
use Carbon\Carbon;
use App\FightDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Exceptions\RobotService\RobotNotFoundException;
use App\Exceptions\FightService\RobotFightConflictException;


class FightService
{
    /**
     * Start Robot fight.
     *
     * @param $request
     *
     * @throws RobotFightConflictException
     * @return Fight
     */
    public function startFight($request) : Fight
    {
        if($request['contestant_robot_id'] == $request['opponent_robot_id'])
        {
            throw new RobotFightConflictException(__('robot.message_robot_duplicate'));
        }

        $ownRobot = Robot::find($request['contestant_robot_id']);
        if(!$ownRobot)
        {
            throw new RobotNotFoundException(__('robot.message_robot_not_found', [ 'robotId' => $request['contestant_robot_id']]));
        }

        $otherRobot = Robot::find($request['opponent_robot_id']);
        if(!$otherRobot)
        {
            throw new RobotNotFoundException(__('robot.message_robot_not_found', [ 'robotId' => $request['opponent_robot_id']]));
        }

        if($ownRobot->user_id != Auth::id() && $otherRobot->user_id != Auth::id())
        {
            throw new RobotFightConflictException(__('robot.message_wrong_robots'));
        }

        if($ownRobot->user_id == $otherRobot->user_id)
        {
            throw new RobotFightConflictException(__('robot.message_robot_same_owner'));
        }

        $fight = NULL;
        if($this->checkDailyOpponent($request['contestant_robot_id'], $request['opponent_robot_id']) && $this->checkDailyMaxAbility($request['contestant_robot_id'], $request['opponent_robot_id']))
        {
            $request['created_by'] = $request['updated_by'] = $request['user_id'] = Auth::id();
            $winnerRobotId = $this->calculateFightResult($ownRobot, $otherRobot);
            
            DB::beginTransaction();
            try 
            {
                $fight = Fight::create($request);
                $fightDetail = [
                    ['fight_id' => $fight->id, 'robot_id' => $request['contestant_robot_id'], 'result' => $request['contestant_robot_id'] == $winnerRobotId ? 1 : 0, 'date' => today()],
                    ['fight_id' => $fight->id, 'robot_id' => $request['opponent_robot_id'], 'result' => $request['opponent_robot_id'] == $winnerRobotId ? 1 : 0, 'date' => today()]
                ];
                
                FightDetail::insert($fightDetail);
                DB::commit();

                $fight->fightDetail = $fightDetail;
            } 
            catch (Exception $exception) 
            {
                DB::rollback();
                throw new RobotFightConflictException($exception->getMessage());
            }
        }

        return $fight;
    }

    /**
     * Checking for daily fight status between contestant and opponent
     *
     * @param int $contestantId
     * @param int $opponentId
     *
     * @throws RobotFightConflictException
     * @return bool
     */
    public function checkDailyOpponent(int $contestantId, int $opponentId) : bool
    {
        $fightDetails = FightDetail::where('date', today()) 
                                ->whereIn('robot_id' , [$contestantId, $opponentId])
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

    /**
     * Checking for daily max fight status of a Robot
     *
     * @param int $contestantId
     * @param int $opponentId
     * 
     * @throws RobotFightConflictException
     * @return bool
     */
    public function checkDailyMaxAbility(int $contestantId, int $opponentId) : bool
    {
        $fightDetails = FightDetail::where('date', today())
                                ->whereIn('robot_id' , [$contestantId, $opponentId])
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

    /**
     * Calculate the fight result based on Robot resource
     *
     * @param Robot $ownRobot
     * @param Robot $otherRobot
     *
     * @return int
     */
    public function calculateFightResult($ownRobot, $otherRobot) : int
    {
        $ownRobot->point = $otherRobot->point = 0;
        $ownRobot->power > $otherRobot->power ? $ownRobot->point = $ownRobot->power * 10 :  $otherRobot->point = $otherRobot->power * 10;
        $ownRobot->speed > $otherRobot->speed ? $ownRobot->point = $ownRobot->speed * 7 : $otherRobot->point = $otherRobot->speed * 7;
        $ownRobot->weight > $otherRobot->weight ? $ownRobot->point-- : $otherRobot->point--;

        return $ownRobot->point > $otherRobot->point ? $ownRobot->id : $otherRobot->id;
    }
}
