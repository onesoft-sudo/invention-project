<?php

namespace App\Http\Middlewares;

use App\Core\Middleware;
use App\Core\Request;
use OSN\Framework\Facades\Response;
use App\Core\View;
use App\Exceptions\HTTPException;
use App\Http\Helpers\CSRFHelper;

class VerifyCSRF extends Middleware
{
    use CSRFHelper;

    /**
     * @return ?string|Response|View|bool
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
        if ($request->isWriteRequest()) {
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