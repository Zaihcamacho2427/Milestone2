<?php

namespace App\Services\Utility;

use Exception;

class DatabaseException extends Exception
{
    //use default constructior
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}