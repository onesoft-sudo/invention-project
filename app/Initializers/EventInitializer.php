<?php


namespace App\Initializers;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use OSN\Framework\Core\Initializer;
use OSN\Framework\Events\BuiltIn\AppRunCompleteEvent;
use OSN\Framework\Events\Event;

class EventInitializer extends Initializer
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
     * Initialize the router.
     *
     * @return void
     */
    public function init()
    {
        $this->app->on(AppRunCompleteEvent::class, function (AppRunCompleteEvent $e) {
            $logger = new Logger('app');
            $logger->pushHandler(new StreamHandler(basepath('/var/log/app.log')));
            $logger->info(request()->method . " " . request()->uri . " " . request()->protocol . " - " . response()->getCode() . " " . response()->getStatusText());
        });
    }

    /**
     * After initialization, when the run() method is called.
     *
     * @return void
     */
    public function afterinit()
    {

    }
}
