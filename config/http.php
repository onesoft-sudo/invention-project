<?php

use App\Http\Middleware\VerifyCSRF;

return [
    'global_middleware' => [
        VerifyCSRF::class
    ]
];
