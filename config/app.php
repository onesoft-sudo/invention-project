<?php

/**
 * The main config file of the application.
 */

return [
    "layout" => "layouts/main",
    'components' => [
        'db' => [
            'database_config' => null
        ]
    ],
    'initializers' => [
        \App\Initializers\AppInitializer::class,
    ]
];
