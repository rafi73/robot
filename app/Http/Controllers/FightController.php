<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FightService;
use App\Http\Resources\FightResource;
use App\Http\Resources\FightPageResource;
use Illuminate\Support\Facades\Auth;

class FightController extends Controller
{
    /**
     * Display list of self owned and others Robots accourding to User
     * @param $userId
     *
     * @return  Illuminate\Http\Resources
     */
    public function getRobots($userId)
    {
        $fightService = new FightService();
        $robotsForFight = $fightService->getRobots($userId);

        return new FightPageResource($robotsForFight['ownedRobots'], $robotsForFight['otherRobots']);
    }

    /**
     * Checking for daily fight status between contestant and opponent
     *
     * @param $request
     *
     * @return json
     */
    public function startFight(Request $request)
    {
        $user = Auth::user();   
        $fightService = new FightService();
        $robotsForFight = $fightService->startFight($request->all());
        
        if(is_array($robotsForFight))
            return response()->json(['Error' => $robotsForFight], 422);
        
        return new FightResource($robotsForFight, 201);
    }
}
