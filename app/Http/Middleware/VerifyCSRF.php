<?php

namespace App\Http\Middleware;

use OSN\Framework\Core\Middleware;
use OSN\Framework\Exceptions\HTTPException;
use OSN\Framework\Http\CSRFHelper;
use OSN\Framework\Http\Request;

class VerifyCSRF extends Middleware
{
    use CSRFHelper;

    /**
     * @return ?bool
     * @throws HTTPException
     */
    public function handle(Request $request)
    {
        /**
        *   Return true or null to evaluate the request as OK. Throw
        *   an App\Exceptions\HTTPException for rejecting it and
        *   rendering an error page. You can also return a View or
        *   Response object here.
        */
        if ($request->isWriteRequest() && !test_env()) {
            $csrf_token = self::get();
            $csrf_request = $request->post("__csrf_token");

            if (!$csrf_token || !$csrf_request || $csrf_token != $csrf_request) {
                throw new HTTPException(419, "Page Expired");
            }

            self::endCSRF();
        }

        return true;
    }
}
