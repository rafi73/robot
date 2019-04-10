<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RobotService;
use App\Http\Requests\RobotRequest;
use App\Http\Resources\RobotResource;
use App\Http\Requests\RobotBulkRequest;


class RobotController extends Controller
{
    /**
     * The robot Service instance.
     *
     * @var RobotService
     */
    protected $robotService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RobotService $robotService = null)
    {
        $this->robotService = $robotService;
    }

    /**
     * Display a list of all Robots
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $robots = $this->robotService->getAll();
        return RobotResource::collection($robots);
    }

    /**
     * Create a new Robot
     * 
     * @param RobotRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     * 
     * @authenticated
     * @response 201 {
     *  "data": {
     *     "id": 1,
     *     "name": "CYOtmiDYgHqMGbvl",
     *     "speed": "45",
     *     "weight": "65",
     *     "power": "678",
     *     "user_id": 1
     *  },
     *  "version": "1.0.0"
     * }
     * @response 422 {
     *    "message": "The given data was invalid"
     * }
     * @response 401 {
     *    "message": "Token not provided"
     * }
     * @response 401 {
     *    "message": "Token has Expired"
     * }
     */
    public function store(RobotRequest $request)
    {
        $robot = $this->robotService->create($request->all()); 
        return new RobotResource($robot);
    }

    /**
     * Display a Robot
     * 
     * @param int $id
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     * 
     * @authenticated
     * @queryParam id required Robot id
     * 
     * @response {
     *  "id": 4,
     *  "name": "Jessica Jones",
     *  "roles": ["admin"]
     * }
     * @response 500 {
     *  "message": "Robot not found with id"
     * }
     * @response 500 {
     *    "message": "Robot owner mismatched, you are not allowed to modify this robot"
     * }
     * @response 401 {
     *    "message": "Token not provided"
     * }
     * @response 401 {
     *  "message": "Token has Expired"
     * }
     */
    public function show($id)
    {
        $robot = $this->robotService->find($id);
        return new RobotResource($robot);
    }

    /**
     * Update a Robot
     * 
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     * 
     * @authenticated
     * @queryParam id required Robot id
     * @response 200 {
     * "data": {
     *     "id": 1,
     *     "name": "CYOtmiDYgHqMGbvl",
     *     "speed": "45",
     *     "weight": "65",
     *     "power": "678",
     *     "user_id": 1
     *  },
     *  "version": "1.0.0"
     * }
     * @response 500 {
     *    "message": "Robot not found with id"
     * }
     * @response 500 {
     *    "message": "Robot owner mismatched, you are not allowed to modify this robot"
     * }
     * @response 401 {
     *    "message": "Token not provided"
     * }
     * @response 401 {
     *    "message": "Token has Expired"
     * }
     */
    public function update(RobotRequest $request, $id)
    {
        $robot = $this->robotService->update($request->all(), $id);
        return new RobotResource($robot);
    }

    /**
     * Delete a Robot
     * 
     * @param type $id
     *
     * @return \Illuminate\Http\Response
     * 
     * @authenticated
     * @response 204 null,
     * @response 500 {
     *    "message": "Robot not found with id"
     * }
     * @response 500 {
     *    "message": "Robot owner mismatched, you are not allowed to modify this robot"
     * }
     * @response 401 {
     *    "message": "Token not provided"
     * }
     * @response 401 {
     *    "message": "Token has Expired"
     * }
     */
    public function delete($id)
    {
        if($this->robotService->delete($id))
        {
            return response()->json(null, 204);
        }   
    }

    /**
     * Import Robots from CSV file
     * 
     * @param RobotBulkRequest $request
     *
     * @return \Illuminate\Http\Response
     * 
     * @authenticated
     * @response 422 {
     *    "message": "The given data was invalid"
     * }
     * @response 500 {
     *    "message": "The structure of CSV file is not applicable to import"
     * }
     * @response 500 {
     *    "message": "The data of CSV file is not applicable to import"
     * }
     * @response 401 {
     *    "message": "Token not provided"
     * }
     * @response 401 {
     *    "message": "Token has Expired"
     * }
     */
    public function storeBulk(RobotBulkRequest $request)
    {
        if($this->robotService->createBulk($request))
        {
            return response()->json([__('robot.message_csv_uploaded')], 200);
        }
    }

    /**
     * Display list of self owned and others Robots accourding to User
     * 
     * @return  Illuminate\Http\Resources
     * 
     * @authenticated
     * @queryParam id required Robot id
     * @response 200 {
     *  "ownedRobots": [{
     *      "id": 17,
     *      "name": "GOtmiDYgHqMGbvl",
     *      "speed": 45,
     *      "weight": 65,
     *      "power": 678,
     *      "user_id": 2
     *   },
     *   {
     *       "id": 2,
     *       "name": "ROtmiDYgHqMGbvl",
     *       "speed": 45,
     *       "weight": 65,
     *       "power": 678,
     *       "user_id": 2
     *   }],
     *  "otherRobots": [{
     *       "id": 3,
     *       "name": "NmiDYgHqMGbvl",
     *       "speed": 45,
     *       "weight": 65,
     *       "power": 678,
     *       "user_id": 1
     *    },
     *    {
     *       "id": 16,
     *       "name": "CYOtmiDYgHqMGbvl",
     *       "speed": 45,
     *       "weight": 65,
     *       "power": 678,
     *       "user_id": 1
     *    }]
     * }
     * @response 401 {
     *    "message": "Token not provided"
     * }
     * @response 401 {
     *    "message": "Token has Expired"
     * }
     */
    public function getFightRobots()
    {
        $ownRobots = $this->robotService->getOwnRobots();
        $otherRobots = $this->robotService->getOtherRobots();
        return response()->json(['ownedRobots' => RobotResource::collection($ownRobots), 'otherRobots' => RobotResource::collection($otherRobots)], 200);
    }
}
