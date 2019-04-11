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
     * Start fight between self and other Robot
     *
     * @param FightRequest $request
     *
     * @return \App\Http\Resources\FightResource
     * 
     * @authenticated
     * @response 201 {
     *  "data": {
     *   "id": 1,
     *   "user_id": 2,
     *   "fight_detail": [
     *       {
     *           "fight_id": 1,
     *           "robot_id": "2",
     *           "result": 0,
     *           "date": "2019-04-09T15:00:00.000000Z"
     *       },
     *       {
     *           "fight_id": 1,
     *           "robot_id": "17",
     *           "result": 1,
     *           "date": "2019-04-09T15:00:00.000000Z"
     *       }
     *   ]
     *  },
     *  "version": "1.0.0"
     * }
     * @response 422 {
     *    "message": "The given data was invalid"
     * }
     * @response 500 {
     *    "message": "Wrong Input!, Robot not found with id 20"
     * }
     * @response 500 {
     *    "message": "Wrong Input!, You dont own any of these Robots"
     * }
     * @response 401 {
     *    "message": "Token not provided"
     * }
     * @response 401 {
     *    "message": "Token has Expired"
     * }
     */
    public function startFight(FightRequest $request) : FightResource
    {   
        $robotsForFight = $this->fightService->startFight($request->all());
        return new FightResource($robotsForFight);
    }
}
