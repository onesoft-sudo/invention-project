<?php

namespace App\Http\Middleware;

use OSN\Framework\Core\Middleware;
use OSN\Framework\Http\Request;
use OSN\Framework\Http\Response;
use OSN\Framework\Exceptions\HTTPException;

class GlobalMiddleware extends Middleware
{
    /**
    *   @return ?string|Response|bool
    */
    public function handle(Request $request)
    {
        /**
        *   You can return true or null to evaluate the request as OK. Also, throwing
        *   an OSN\Framework\Exceptions\HTTPException will reject the request with the given data and
        *   render an error page. You can also return a View, string or Response object here.
        */

        return true;
    }
}
