<?php


namespace App\Exceptions;

use Exception;
use Throwable;

class HTTPException extends Exception
{
    protected $code = 404;

    public function __construct($code = 0, $message = '', Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}