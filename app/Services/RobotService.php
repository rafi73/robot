<?php

namespace App\Services;

use App\Contracts\RepositoryInterface;
use App\Robot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class RobotService implements RepositoryInterface
{
    /**
     * Get all robots.
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
     * @param $request
     *
     * @return static
     */
    public function create($request)
    {
        return Robot::create($request);
    }

    /**
     * Delete a robot by id.
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        return Robot::destroy($id);
    }

    /**
     * Update a robot.
     *
     * @param $request
     * @param $id
     *
     * @return mixed
     */
    public function update($request, $id)
    {
        //return Robot::where('id', $id)->update($request);

        return tap(Robot::findOrFail($id))->update($request)->fresh();
    }

    /**
     * Find a robot by id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return Robot::find($id);
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
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            Storage::disk('local')->putFileAs('', $file, $file->getClientOriginalName());

            
            $lines = explode("\r\n", file_get_contents($request->file('file')));
            $head = str_getcsv(array_shift($lines));
            $robots = [];

            for ($i = 0; $i < count($lines); $i++) 
            { 
                if($i == 0 || !strlen($lines[$i])) continue;
                $check = array_combine($head, str_getcsv($lines[$i]));
                $check['created_by'] = $request->created_by;
                $check['updated_by'] = $request->created_by;
                $check['created_at'] = now();
                $check['updated_at'] = now();
                $robots[] = $check;
            }
            return Robot::insert($robots);
        }
    }
}
