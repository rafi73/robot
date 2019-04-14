<?php

namespace App\Services;

use App\Robot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Exceptions\RobotService\RobotNotFoundException;
use App\Exceptions\RobotService\RobotBulkDataErrorException;
use App\Exceptions\RobotService\RobotBulkStructureException;
use App\Exceptions\RobotService\RobotOwnerMismatchedException;



class RobotService implements RepositoryInterface
{
    /**
     * Get all Robots.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAll() : LengthAwarePaginator
    {
        return Robot::paginate(10);
    }

    /**
     * Create & store a new robot
     *
     * @param array $request
     * @return \App\Robot
     */
    public function create(array $request) : Robot
    {
        $user = Auth::user();
        $request['created_by'] = $request['updated_by'] = $request['user_id'] = Auth::user()->id;
        return Robot::create($request); 
    }

    /**
     * Delete a Robot by id
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool
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
     * @param array $request
     * @param int $id
     * @return \App\Robot
     */
    public function update(array $request, int $id) : Robot
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
     * Find a Robot by id
     *
     * @param int $id
     * @return \App\Robot
     */
    public function find(int $id) : Robot
    {
        $robot = Robot::find($id);
        if(!$robot)
        {
            throw new RobotNotFoundException();
        }
        return $robot;
    }

    /**
     * Create & store robots from CSV
     *
     * @param array $request
     * @return bool
     */
    public function createBulk(array $request) : bool
    {
        $requiredStructure = ['name', 'power', 'speed', 'weight'];
        $file = $request['file'];
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
            if(!strlen($lines[$i])) continue;
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

    /**
     * Getting own Robots
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getOwnRobots() : Collection
    {
        return Auth::user()->robots;
    }

    /**
     * Getting others Robots
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getOtherRobots() : Collection
    {
        return Robot::where('user_id', '<>', Auth::id())->get();
    }
}
