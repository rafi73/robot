<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FightDetail extends Model
{
    protected $fillable = ['fight_id', 'robot_id', 'result', 'date']; 

    public function robot()
    {
        return $this->belongsTo(Robot::class);
    }

    public function fight()
    {
        return $this->belongsTo(Fight::class);
    }
}
