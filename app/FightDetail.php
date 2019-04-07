<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FightDetail extends Model
{
    public function robot()
    {
        return $this->belongsTo(Robot::class);
    }

    public function fight()
    {
        return $this->belongsTo(Fight::class);
    }
}
