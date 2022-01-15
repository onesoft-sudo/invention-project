<?php

namespace App\Http;

use App\Http\Middleware\VerifyCSRF;

class Config
{
    public static array $globalMiddlewares = [
        VerifyCSRF::class
    ];
}
