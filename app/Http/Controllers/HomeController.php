<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HomeService;
use App\Http\Resources\TopFightResource;
use App\Http\Resources\LatestFightResource;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
     /**
     * The robot Service instance.
     *
     * @var HomeService
     */
    protected $homeService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeService $homeService = null)
    {
        $this->homeService = $homeService;
    }
    
    /**
     * Display Home Data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * 
     * @response 200 {
     *  "latest": [
     *   {
     *       "id": 1,
     *       "robot_1_name": "Yertwtwt",
     *       "robot_2_name": "Sfgssfgsfg",
     *       "winner_robot_name": "Sfgssfgsfg"
     *   }
     * ],
     * "top": [
     *   {
     *       "fights": 1,
     *       "wins": "1",
     *       "looses": 0,
     *       "robot_name": "Sfgssfgsfg"
     *   },
     *   {
     *       "fights": 1,
     *       "wins": "0",
     *       "looses": 1,
     *       "robot_name": "Yertwtwt"
     *   }
     *  ]
     * }
     */
    public function getHomeData() : Response
    {
        return response()->json(
            [
                'latest' => LatestFightResource::collection($this->homeService->getLatestFightResult()), 
                'top' => TopFightResource::collection($this->homeService->getTopRobots())
            ], 200
        );
    }
}
