<?php

return [
    \App\PaymentGatewayContract::class => [
        'object' => new \App\CreditPaymentGateway('INR'),
        'once' => true,
        'prop' => 'payment'
    ]
];
