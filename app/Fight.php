<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
    protected $fillable = ['contestant_robot_id', 'opponent_robot_id', 'contestant_robot_score', 'opponent_robot_score', 'date', 'created_by', 'updated_by']; 
}
