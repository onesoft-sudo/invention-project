<?php


namespace App;


class CreditPaymentGateway implements PaymentGatewayContract
{
    private string $currency;

    public function __construct(string $currency)
    {
        $this->currency = $currency;
    }

    public function charge(int $amount)
    {
        return [
            "amount" => $amount,
            "charged" => true,
            "currency" => $this->currency,
            "fees" => $amount * 0.04
        ];
    }
}
