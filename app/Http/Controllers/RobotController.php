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
    protected $robots;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RobotService $robots = null)
    {
        $this->robots = $robots;
    }

    /**
     * Display a list of all robots.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $robots = $this->robots->getAll();
        return RobotResource::collection($robots);
    }

    /**
     * Create a new robot.
     *
     * @param RobotRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store(RobotRequest $request)
    {
        $robot = $this->robots->create($request->all()); 
        return new RobotResource($robot);
    }

    /**
     * Display an robot.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show($id)
    {
        $robot = $this->robots->find($id);
        return new RobotResource($robot);
    }

    /**
     * Update an Robot.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RobotRequest $request, $id)
    {
        $robot = $this->robots->update($request->all(), $id);
        return new RobotResource($robot);
    }

    /**
     * Delete an Robot.
     *
     * @param type $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if($this->robots->delete($id))
        {
            return response()->json(null, 204);
        }   
    }

    /**
     * Import Robots from CSV file.
     *
     * @param RobotBulkRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function storeBulk(RobotBulkRequest $request)
    {
        if($this->robots->createBulk($request))
        {
            return response()->json([__('robot.message_csv_uploaded')], 200);
        }
    }
}
