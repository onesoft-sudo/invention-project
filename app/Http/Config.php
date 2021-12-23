<?php

namespace App\Http;

use App\Http\Middlewares\VerifyCSRF;

class Config
{
    public array $globalMiddlewares = [
        VerifyCSRF::class
    ];
}
