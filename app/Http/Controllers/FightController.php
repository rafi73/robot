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
     * Checking for daily fight status between contestant and opponent
     *
     * @param FightRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function startFight(FightRequest $request)
    {   
        $robotsForFight = $this->fightService->startFight($request->all());
        return new FightResource($robotsForFight);
    }
}
