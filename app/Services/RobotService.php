<?php

namespace App\Services;

use App\Contracts\RepositoryInterface;
use App\Robot;

class RobotService implements RepositoryInterface
{
    public function getAll()
    {
        return Robot::all();
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
}
