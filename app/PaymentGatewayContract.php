<?php

namespace App;

interface PaymentGatewayContract
{
    public function charge(int $amount);
}
