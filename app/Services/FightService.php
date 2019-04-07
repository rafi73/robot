<?php

namespace App\Services;
use App\Robot;
use App\Fight;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class FightService
{
    const MAX_DAILY_FIGHT_LIMIT = 5;

    /**
     * Start Robot fight.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function startFight($request)
    {
        $errorMessages = [];
        if($request['contestant_robot_id'] == $request['opponent_robot_id'])
            $errorMessages[] = 'Wrong Input!, Robot can not fight to it self';

        if($this->checkDailyOpponent($request['contestant_robot_id'], $request['opponent_robot_id']))
            $errorMessages[] =  'These robots already fought today';
        
        if(!$this->checkDailyMaxAbility($request['contestant_robot_id']))
            $errorMessages[] = 'Daily Max fight limit for robot '.$request['contestant_robot_id'].' exceed';
        
        if(!$this->checkDailyMaxAbility($request['opponent_robot_id']))
            $errorMessages[] = 'Daily Max fight limit for robot '.$request['opponent_robot_id'].' exceed';

        if(count($errorMessages))
            return $errorMessages;
        
        $fightingScore = $this->calculateFightResult($request['contestant_robot_id'], $request['opponent_robot_id']);
        $request['contestant_robot_score'] = $fightingScore['contestantRobotScore'];
        $request['opponent_robot_score'] = $fightingScore['opponentRobotScore'];
        $request['winner_robot_id'] = $fightingScore['winnerRobotId'];
        $request['date'] = today();
        return Fight::create($request);
    }

    /**
     * Checking for daily fight status between contestant and opponent
     *
     * @param int $contestantId
     * @param int $opponentId
     *
     * @return bool
     */
    public function checkDailyOpponent(int $contestantId, int $opponentId) : bool
    {
        return Fight::whereIn('contestant_robot_id', [$contestantId, $opponentId])
                    ->whereIn('opponent_robot_id', [$contestantId, $opponentId])
                    ->where('date', today())
                    ->exists();
        
    }

    /**
     * Checking for daily max fight status of a Robot
     *
     * @param int $robotId
     *
     * @return bool
     */
    public function checkDailyMaxAbility(int $robotId) : int
    {
        $result = true;
        $count = Fight::where('contestant_robot_id', $robotId)
                    ->orWhere('opponent_robot_id', $robotId)
                    ->where('date', today())
                    ->count();
        
        if($count >= self::MAX_DAILY_FIGHT_LIMIT)
            $result = false;
        
        return $result;
    }

    /**
     * Calculate the fight result based on Robot resource
     *
     * @param int userId
     *
     * @return array
     */
    public function calculateFightResult(int $contestantRobotId, int $opponentRobotId) : array
    {
        $ownRobot = Robot::findOrFail($contestantRobotId)->toArray();
        $otherRobot = Robot::findOrFail($opponentRobotId)->toArray();

        $ownRobot['point'] = $otherRobot['point'] = 0;
        $ownRobot['power'] > $otherRobot['power'] ? $ownRobot['point']++ : $otherRobot['point']++;
        $ownRobot['speed'] > $otherRobot['speed'] ? $ownRobot['point']++ : $otherRobot['point']++;
        $ownRobot['weight'] > $otherRobot['weight'] ? $ownRobot['point']-- : $otherRobot['point']--;

        return [
            'contestantRobotScore' => $ownRobot['point'], 
            'opponentRobotScore' => $otherRobot['point'], 
            'winnerRobotId' => ($ownRobot['point'] > $otherRobot['point'] ? $contestantRobotId : $opponentRobotId) 
        ];
    }

    private function checkGreater()
    {

    }

    /**
     * Getting Robots for fight.
     *
     * @param int userId
     *
     * @return array
     */
    public function getRobots(int $userId) : array
    {
        $ownedRobots =  Robot::where('created_by', $userId)->get();
        $otherRobots = Robot::where('created_by', '<>', $userId)->get();

        return ['ownedRobots' => $ownedRobots, 'otherRobots' =>  $otherRobots];
    }

}
