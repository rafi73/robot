<?php

namespace App\Exceptions\RobotService;;

use Exception;

class RobotBulkDataErrorException extends Exception
{
    public function __construct($message = null, $code = 404)
    {
        $message = $message ?: __('robot.message_bulk_data_error');
        parent::__construct($message, $code);
    }
}
