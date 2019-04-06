<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    protected $fillable = ['name', 'speed', 'weight', 'power', 'created_by', 'updated_by']; 
}
