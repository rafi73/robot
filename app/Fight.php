<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
    protected $fillable = ['contestant_robot_id', 'opponent_robot_id', 'contestant_robot_score', 'opponent_robot_score', 'winner_robot_id', 'date', 'created_by', 'updated_by']; 

    public function contestantRobot()
    {
        return $this->belongsTo(Robot::class, 'contestant_robot_id', 'id');
    } 

    public function opponentRobot()
    {
        return $this->belongsTo(Robot::class, 'opponent_robot_id', 'id');
    }

    public function winnerRobot()
    {
        return $this->belongsTo(Robot::class, 'winner_robot_id', 'id');
    }
}
