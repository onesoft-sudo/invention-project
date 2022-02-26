<?php

use OSN\Framework\Facades\Router;
use OSN\Framework\RateLimiting\RateLimiter;

Router::get('/api/ip', [\App\Http\Controllers\IPController::class, 'index'])->middleware(new RateLimiter(5, 20));
