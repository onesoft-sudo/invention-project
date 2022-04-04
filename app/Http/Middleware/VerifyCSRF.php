<?php

namespace App\Http\Middleware;

use OSN\Framework\Core\Middleware;
use OSN\Framework\Exceptions\HTTPException;
use OSN\Framework\Http\CSRFHelper;
use OSN\Framework\Http\Request;

class VerifyCSRF extends Middleware
{
    /**
     * @return ?bool
     * @throws HTTPException
     */
    public function handle(Request $request)
    {
        if ($request->isWriteRequest() && !test_env()) {
            $csrf_request = $request->post("__csrf_token");

            if (!$csrf_request || !app()->csrf->isValid($csrf_request)) {
                app()->csrf->endCSRF();
                throw new HTTPException(419, "Page Expired");
            }

            app()->csrf->prune();
        }

        return true;
    }
}
