<?php


namespace App\Commands\Console;


use OSN\Framework\Console\ArgumentCollection;
use OSN\Framework\Console\Command;

class ServeCommand extends Command
{
    public function subcommandsDescription(): array
    {
        return [
            'default' => [
                "Start a development server locally",
            ]
        ];
    }

    public function default(ArgumentCollection $args)
    {
        if (!parent::default($args))
            return;

        system("php -S localhost:" . env('SERVER_PORT') . " -t ./public");
    }
}
