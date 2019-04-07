<?php

namespace App\Exceptions\FightService;

class RobotFightConflictException extends \Exception
{
    public function __construct($message = null, $code = 409)
    {
        $message = $message ?: 'Robot fight conflict.';
        parent::__construct($message, $code);
    }
}