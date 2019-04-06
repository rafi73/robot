<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RobotService;
use App\Http\Resources\RobotResource;
use App\Http\Requests\RobotRequest;
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
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a list of all robots.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $robotService = new RobotService();
        $robots = $robotService->getAll();
        return RobotResource::collection($robots);
    }

    /**
     * Create a new robot.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store(RobotRequest $request)
    {
        //$this->robots->create($request->all());
        $robotService = new RobotService();
        $robot = $robotService->create($request->all()); 
        return new RobotResource($robot);
    }

    /**
     * Display an robot.
     *
     * @param type $id
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show($id)
    {
        //$robot = $this->robots->find($id);
        $robotService = new RobotService(); 
        $robot = $robotService->find($id);
        return new RobotResource($robot);
    }

    /**
     * Update an robot.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RobotRequest $request, $id)
    {
        //$this->robots->update($request->all(), $id);
        $robotService = new RobotService();
        $robot = $robotService->update($request->all(), $id);
        return new RobotResource($robot);
    }

    /**
     * Delete an robot.
     *
     * @param type $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //$this->robots->delete($id);
        $robotService = new RobotService();
        if($robotService->delete($id))
            return response()->json(null, 204);
    }

    /**
     * Create a new robot.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function storeBulk(Request $request)
    {
        //$this->robots->create($request->all());
        $robotService = new RobotService();
        if($robotService->createBulk($request))
        {
            $robots = $robotService->getAll();
            return RobotResource::collection($robots);
        }
    }
}
