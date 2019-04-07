<?php

namespace App\Services;

use App\Contracts\RepositoryInterface;
use App\Robot;
use Carbon\Carbon;
use App\Fight;


class HomeService 
{
    /**
     * Get Latest Robot fight results.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestFightResult()
    {
        return Fight::with('contestantRobot')->with('opponentRobot')->with('winnerRobot')->latest()->take(5)->get();
    }

     /**
     * Get Top Robots.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTopRobots()
    {
        return Fight::with('winnerRobot')->groupBy('winner_robot_id')->selectRaw('count(*) as total, winner_robot_id')->orderBy('total', 'desc')->take(10)->get();
    }
}
