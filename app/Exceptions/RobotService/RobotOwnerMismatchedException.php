<?php

namespace App\Exceptions\RobotService;
use Exception;

class RobotOwnerMismatchedException extends Exception
{
    public function __construct($message = null, $code = 409)
    {
        $message = $message ?: __('robot.message_owner_mismatched');
        parent::__construct($message, $code);
    }
}