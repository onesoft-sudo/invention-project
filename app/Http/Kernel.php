<?php

namespace App\Http;

use App\Http\Middlewares\VerifyCSRF;

class Kernel
{
    public array $globalMiddlewares = [
//        VerifyCSRF::class
    ];
}