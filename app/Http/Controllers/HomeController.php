<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HomeService;
use App\Http\Resources\TopFightResource;
use App\Http\Resources\LatestFightResource;


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
     * Display Home Data.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function getHomeData()
    {
        return response()->json(['latest' => LatestFightResource::collection($this->homeService->getLatestFightResult()), 
                                    'top' => TopFightResource::collection($this->homeService->getTopRobots())], 200);
    }
}
