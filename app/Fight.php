<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
    protected $fillable = ['user_id', 'created_by', 'updated_by']; 

    public function fightDetail()
    {
        return $this->hasMany(FightDetail::class);
    }
}
