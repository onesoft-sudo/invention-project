<?php


namespace App;


class BankPaymentGateway implements PaymentGatewayContract
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
            "currency" => $this->currency
        ];
    }
}
