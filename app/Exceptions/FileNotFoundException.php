<?php


namespace App\Exceptions;

use Exception;

class FileNotFoundException extends Exception
{
    protected $code = -1;
    protected $message = "No such file or directory";
}