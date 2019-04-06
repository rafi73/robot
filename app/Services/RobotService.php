<?php

namespace App\Services;

use App\Contracts\RepositoryInterface;
use App\Robot;

class RobotService implements RepositoryInterface
{
    public function getAll()
    {
        return Robot::paginate(10);
    }

    public function create($request)
    {
        return Robot::create($request);
    }

    public function delete($id)
    {
        return Robot::destroy($id);
    }

    public function update($request, $id)
    {
        //return Robot::where('id', $id)->update($request);

        return tap(Robot::findOrFail($id))->update($request)->fresh();
    }

    public function find($id)
    {
        return Robot::find($id);
    }

    public function createBulk($request)
    {
        if($request->hasFile('file'))
        {
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
