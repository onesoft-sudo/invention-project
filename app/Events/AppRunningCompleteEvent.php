<?php


namespace App\Events;


use App\EventHandlers\JobEventHandler;
use OSN\Framework\Events\Event;

class AppRunningCompleteEvent extends Event
{
    /**
     * @return mixed|void
     */
    public function execute()
    {

    }

    /**
     * @return mixed|void
     */
    public function prevent()
    {

    }

    /**
     * @return mixed|void
     */
    public function stop()
    {

    }
}
