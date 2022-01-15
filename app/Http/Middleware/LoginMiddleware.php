<?php

namespace App\Http\Middleware;

use OSN\Framework\Core\Middleware;
use OSN\Framework\Facades\Response;
use OSN\Framework\Facades\Auth;
use OSN\Framework\Http\Request;

class LoginMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if (Auth::isAuthenticated()) {
            return Response::redirect("/dashboard");
        }
    }
}
