<?php

namespace App\Services;

use App\Robot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Database\QueryException;
use App\Exceptions\RobotService\RobotNotFoundException;
use App\Exceptions\RobotService\RobotBulkStructureException;
use App\Exceptions\RobotService\RobotOwnerMismatchedException;
use App\Exceptions\RobotService\RobotBulkDataErrorException;


class RobotService implements RepositoryInterface
{
    /**
     * Get all Robots.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Robot::paginate(10);
    }

    /**
     * Create & store a new robot.
     *
     * @param RobotRequest $request
     *
     * @return static
     */
    public function create($request) : Robot
    {
        $request['created_by'] = $request['updated_by'] = $request['user_id'] = Auth::user()->id;
        return Robot::create($request); 
    }

    /**
     * Delete a Robot by id.
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        $robot = Robot::find($id);
        if(!$robot)
        {
            throw new RobotNotFoundException();
        }
        if($robot->user_id != Auth::id())
        {
            throw new RobotOwnerMismatchedException();
        }

        return Robot::destroy($id);
    }

    /**
     * Update a Robot.
     *
     * @param $request
     * @param $id
     *
     * @return mixed
     */
    public function update($request, $id) 
    {
        $robot = Robot::find($id);
        if(!$robot)
        {
            throw new RobotNotFoundException();
        }
        if($robot->user_id != Auth::id())
        {
            throw new RobotOwnerMismatchedException();
        }

        return tap(Robot::findOrFail($id))->update($request)->fresh();
    }

    /**
     * Find a Robot by id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        $robot = Robot::find($id);
        if(!$robot)
        {
            throw new RobotNotFoundException();
        }
        return $robot;
    }

    /**
     * Create & store robots from CSV.
     *
     * @param $request
     *
     * @return bool
     */
    public function createBulk($request)
    {
        $requiredStructure = ['name', 'power', 'speed', 'weight'];
        $file = $request->file('file');
        Storage::disk('local')->putFileAs('', $file, $file->getClientOriginalName());
        
        $lines = explode("\n", file_get_contents($file));
        $head = str_getcsv(array_shift($lines));
        sort($head);

        if($head !== $requiredStructure)
        {
            throw new RobotBulkStructureException();
        }

        $robots = [];
        for ($i = 0; $i < count($lines); $i++) 
        { 
            if($i == 0 || !strlen($lines[$i])) continue;
            $check = array_combine($head, str_getcsv($lines[$i]));
            $check['created_by'] = $check['updated_by'] = $check['user_id'] = Auth::id();
            $check['created_at'] = $check['updated_at'] = now();
            $robots[] = $check;
        }
        
        try 
        {
            Robot::insert($robots);
        }
        catch(QueryException $exception)
        {
            throw new RobotBulkDataErrorException();
        }
        return true;
    }
}
