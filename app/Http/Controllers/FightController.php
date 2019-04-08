<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FightService;
use App\Http\Requests\FightRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RobotResource;
use App\Http\Resources\FightResource;
use App\Http\Resources\FightPageResource;


class FightController extends Controller
{
    /**
     * The Fight Service instance.
     *
     * @var FightService
     */
    protected $fightService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FightService $fightService = null)
    {
        $this->fightService = $fightService;
    }

    /**
     * Display list of self owned and others Robots accourding to User
     * @param $userId
     *
     * @return  Illuminate\Http\Resources
     */
    public function getRobots($userId)
    {
        $ownRobots = $this->fightService->getOwnRobots($userId);
        $otherRobots = $this->fightService->getOtherRobots($userId);
        return response()->json(['ownedRobots' => RobotResource::collection($ownRobots), 'otherRobots' => RobotResource::collection($otherRobots), 200]);
    }

    /**
     * Checking for daily fight status between contestant and opponent
     *
     * @param FightRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function startFight(FightRequest $request)
    {
        $user = Auth::user();   
        $robotsForFight = $this->fightService->startFight($request->all());
        return new FightResource($robotsForFight);
    }
}
