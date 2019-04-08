<?php

namespace App\Exceptions\RobotService;

class RobotBulkStructureException extends \Exception
{
    public function __construct($message = null, $code = 404)
    {
        $message = $message ?: __('robot.message_bulk_structure_error');
        parent::__construct($message, $code);
    }
}