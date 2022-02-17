<?php


namespace App\Initializers;


use App\CreditPaymentGateway;
use App\EventHandlers\OnAppRunComplete;
use App\Events\AppRunningCompleteEvent;
use App\BankPaymentGateway;
use App\PaymentGatewayContract;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use OSN\Framework\Core\Initializer;
use OSN\Framework\Events\BuiltIn\AppRunCompleteEvent;

class AppInitializer extends Initializer
{
    /**
     * Before app initialization.
     * Note that some components/objects might not be initialized at this point.
     *
     * @return void
     */
    public function preinit()
    {

    }

    /**
     * Initialize the app.
     *
     * @return void
     */
    public function init()
    {
//        $this->app->bindOnce(PaymentGatewayContract::class, function () {
//            return new CreditPaymentGateway('EUR');
//        });
    }

    /**
     * After app initialization, when the run() method is called.
     *
     * @return void
     */
    public function afterinit()
    {

    }
}
