<?php
/**
 * The main config file of the application.
 */

return [
    "layout" => "layouts/main",
    "env" => false,
    "bindings" => require __DIR__ . "/bindings.php",
    "http" => require __DIR__ . "/http.php",
    'initializers' => [
        \App\Initializers\AppInitializer::class,
        \App\Initializers\EventInitializer::class,
        \App\Initializers\RouteInitializer::class,
    ]
];
