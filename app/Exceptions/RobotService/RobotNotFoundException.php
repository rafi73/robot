<?php

namespace App\Exceptions\RobotService;

class RobotNotFoundException extends \Exception
{
    public function __construct($message = null, $code = 404)
    {
        $message = $message ?: __('robot.message_not_found');
        parent::__construct($message, $code);
    }
}