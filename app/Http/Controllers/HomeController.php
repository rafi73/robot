<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HomeService;
use App\Http\Resources\LatestFightResource;
use App\Http\Resources\TopFightResource;

class HomeController extends Controller
{
    public function getHomeData()
    {
        $homeService = new HomeService();
        $homeService->getTopRobots();

        return response()->json(['latest' => LatestFightResource::collection($homeService->getLatestFightResult()), 
                                    'top' => TopFightResource::collection($homeService->getTopRobots())]);
    }
}
