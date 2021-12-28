<?php

namespace App\Http\Middlewares;

use OSN\Framework\Core\Middleware;
use OSN\Framework\Exceptions\HTTPException;
use OSN\Framework\Facades\Response;
use OSN\Framework\Facades\Auth;
use OSN\Framework\Http\Request;

class AuthMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if (!Auth::isAuthenticated()) {
            return Response::redirect("/login");
        }
    }
}
