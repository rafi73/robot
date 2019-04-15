<?php

namespace App\Services;

use Cache;
use App\Fight;
use App\FightDetail;
use Illuminate\Database\Eloquent\Collection;


class HomeService
{
    /**
     * Get Latest Robot's fight results
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestFightResult(): Collection
    {
        return Cache::remember('latest_fights', 120, function(){
            return Fight::with('fightDetail.robot')->latest()->take(5)->get();
        });
    }

    /**
     * Get Top Robot's fight results
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTopRobots(): Collection
    {
        return Cache::remember('top_robots', 120, function(){
            return FightDetail::with('robot')
                ->groupBy('robot_id')
                ->selectRaw('SUM(result) AS wins, COUNT(fight_id) AS fights, robot_id')
                ->orderBy('wins', 'desc')
                ->take(10)
                ->get();
        });
    }
}
