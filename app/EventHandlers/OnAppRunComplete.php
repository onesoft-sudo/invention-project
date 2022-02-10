<?php


namespace App\EventHandlers;


use OSN\Framework\Events\EventHandler;
use OSN\Framework\Events\EventInterface;

class OnAppRunComplete implements EventHandler
{
    public function handle(EventInterface $event)
    {
        dump($event);
    }
}
