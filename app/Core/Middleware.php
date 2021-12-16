<?php


namespace App\Core;


use App\Exceptions\HTTPException;
use Closure;

abstract class Middleware
{
    /**
     * @throws HTTPException
     */
    abstract public function handle(Request $request);
}