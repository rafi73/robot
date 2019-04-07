<?php

namespace App\Services;

use App\Contracts\RepositoryInterface;
use App\Robot;
use Carbon\Carbon;
use App\Fight;
use App\FightDetail;


class HomeService 
{
    /**
     * Get Latest Robot's fight results
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestFightResult()
    {
        return Fight::with('fightDetail.robot')->latest()->take(5)->get();
    }

    /**
     * Get Top Robot's fight results
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTopRobots()
    {
        return FightDetail::with('robot')
                        ->groupBy('robot_id')
                        ->selectRaw('SUM(result) AS wins, COUNT(fight_id) AS fights, robot_id')
                        ->orderBy('fights', 'desc')
                        ->orderBy('wins', 'desc')
                        ->take(10)
                        ->get();
    }
}
