<?php

namespace App\Http\Middlewares;

use App\Core\Middleware;
use App\Core\Request;
use OSN\Framework\Facades\Response;
use OSN\Framework\Facades\Auth;

class AuthMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if (!Auth::isAuthenticated()) {
            Response::redirect("/login");
            exit();
        }
    }
}