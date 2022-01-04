<?php

/**
 * The main config file of the application.
 */

return [
    'env' => '.env',
    'components' => [
        'db' => [
            'database_config' => null
        ],
        'urlManager' => [
            'pretty_urls' => true,
            'array_to_json' => true
        ]
    ]
];
