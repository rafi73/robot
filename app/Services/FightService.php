<?php

namespace App\Services;
use App\Robot;
use App\Fight;
use App\FightDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class FightService
{
    const MAX_DAILY_FIGHT_LIMIT = 5;
    private $errorMessages = [];
    /**
     * Start Robot fight.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function startFight($request)
    {
        if($request['contestant_robot_id'] == $request['opponent_robot_id'])
            $this->errorMessages[] = 'Wrong Input!, Robot can not fight to it self';

        $this->checkDailyOpponent($request['contestant_robot_id'], $request['opponent_robot_id']);
        $this->checkDailyMaxAbility($request['contestant_robot_id'], $request['opponent_robot_id']);

        if(count($this->errorMessages))
            return $this->errorMessages;
        
        $fightingScore = $this->calculateFightResult($request['contestant_robot_id'], $request['opponent_robot_id']);
        $fight = Fight::create($request);

        FightDetail::insert([
            ['fight_id' => $fight->id, 'robot_id' => $request['contestant_robot_id'], 'result' => $request['contestant_robot_id'] == $fightingScore['winnerRobotId'] ? 1 : 0, 'date' => today()],
            ['fight_id' => $fight->id, 'robot_id' => $request['opponent_robot_id'], 'result' => $request['opponent_robot_id'] == $fightingScore['winnerRobotId'] ? 1 : 0, 'date' => today()]
        ]);

        return $fight;
    }

    /**
     * Checking for daily fight status between contestant and opponent
     *
     * @param int $contestantId
     * @param int $opponentId
     *
     * @return bool
     */
    public function checkDailyOpponent(int $contestantId, int $opponentId) 
    {
        $data = FightDetail::where('date', today()) 
                            ->whereIn('robot_id' , [$contestantId, $opponentId])
                            ->groupBy('fight_id')
                            ->selectRaw('COUNT(*) as duplicate')
                            ->havingRaw('duplicate = 2')
                            ->exists();
        if($data)
            $this->errorMessages[] =  'These robots already fought today';
    }

    /**
     * Checking for daily max fight status of a Robot
     *
     * @param int $robotId
     *
     * @return bool
     */
    public function checkDailyMaxAbility(int $contestantId, int $opponentId)
    {
        $data = FightDetail::where('date', today())
                                ->whereIn('robot_id' , [$contestantId, $opponentId])
                                ->groupBy('robot_id')
                                ->selectRaw('COUNT(*) as fights, robot_id')
                                ->havingRaw('fights >= 5')
                                ->get();

        if(count($data) == 1)
            $this->errorMessages[] = 'Daily Max fight limit for robot '.$data[0]['robot_id'].' exceed';
        if(count($data) > 1)
            $this->errorMessages[] = 'Daily Max fight limit for both robots exceed';
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
