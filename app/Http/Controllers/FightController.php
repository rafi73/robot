<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FightService;
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
    protected $fights;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FightService $fights = null)
    {
        $this->fights = $fights;
    }

    /**
     * Display list of self owned and others Robots accourding to User
     * @param $userId
     *
     * @return  Illuminate\Http\Resources
     */
    public function getRobots($userId)
    {
        $ownRobots = $this->fights->getOwnRobots($userId);
        $otherRobots = $this->fights->getOtherRobots($userId);
        return response()->json(['ownedRobots' => RobotResource::collection($ownRobots), 'otherRobots' => RobotResource::collection($otherRobots)]);
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
        $robotsForFight = $this->fights->startFight($request->all());
        return new FightResource($robotsForFight);
    }
}
