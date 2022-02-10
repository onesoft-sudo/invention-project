<?php


namespace App\EventHandlers;


use OSN\Framework\Events\EventHandler;
use OSN\Framework\Events\EventInterface;

class JobEventHandler implements EventHandler
{
    public function handle(EventInterface $event)
    {
        return $event->jobName;
    }
}
