<?php

namespace App\Services;

use DB;
use Exception;
use App\Robot;
use App\Fight;
use Carbon\Carbon;
use App\FightDetail;
use Illuminate\Http\Request;
use App\Contracts\FightInterface;
use App\Helpers\FightRobotsStatus;
use Illuminate\Support\Facades\Auth;
use App\Helpers\FightStatusDailyLimit;
use App\Helpers\FightValidationManager;
use App\Helpers\FightRobotsOwnerStatus;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Collection;
use App\Helpers\FightStatusDailyOpponentLimit;
use App\Exceptions\RobotService\RobotNotFoundException;
use App\Exceptions\FightService\RobotFightConflictException;

class FightService
{
    /**
     * Start Robot fight.
     *
     * @param array $request
     * @throws \App\Exceptions\FightService\RobotFightConflictException
     * @return \App\Fight
     */
    public function startFight(array $request) : Fight
    {
        $fight = null;
        $manager = new FightValidationManager();

        if( $manager->check(new FightRobotsStatus($request)) &&
            $manager->check(new FightRobotsOwnerStatus($request)) &&
            $manager->check(new FightStatusDailyOpponentLimit($request)) &&
            $manager->check(new FightStatusDailyLimit($request)))
        {
            $request['created_by'] = $request['updated_by'] = $request['user_id'] = Auth::id();
            $winnerRobotId = $this->calculateFightResult($request);
            
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
                $message = 'General system error!, please contact us if the problem persist';
                if($exception instanceof QueryException)
                {
                    $message = 'Temporary issue with database service, please contact us if the problem persist';
                }
                throw new RobotFightConflictException($exception->getMessage());
            }
        }
        return $fight;
    }

    /**
     * Calculate the fight result based on Robot resource
     *
     * @param array $request
     * @return int
     */
    public function calculateFightResult(array $request) : int
    {
        $ownRobot = Robot::find($request['contestant_robot_id']);
        if (!$ownRobot)
        {
            throw new RobotNotFoundException(__('robot.message_robot_not_found', [ 'robotId' => $this->robotIds['contestant_robot_id']]));
        }

        $otherRobot = Robot::find($request['opponent_robot_id']);
        if (!$otherRobot)
        {
            throw new RobotNotFoundException(__('robot.message_robot_not_found', [ 'robotId' => $this->robotIds['opponent_robot_id']]));
        }

        // $ownRobot->point = $otherRobot->point = 0;
        // $ownRobot->power > $otherRobot->power ? $ownRobot->point = $ownRobot->power * 10 :  $otherRobot->point = $otherRobot->power * 10;
        // $ownRobot->speed > $otherRobot->speed ? $ownRobot->point += $ownRobot->speed * 7 : $otherRobot->point += $otherRobot->speed * 7;
        // $ownRobot->weight > $otherRobot->weight ? $ownRobot->point-- : $otherRobot->point--;

         return abs($ownRobot->point - $otherRobot->point) < 20 ? (rand(0, 1) ? $ownRobot->id : $otherRobot->id) : ($ownRobot->point > $otherRobot->point ? $ownRobot->id : $otherRobot->id);

        //$ownRobot->point - $otherRobot->point 
    }
}
