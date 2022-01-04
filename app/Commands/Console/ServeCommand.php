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
        if ($args->hasOption('--help')) {
            echo("Usage: php {$args->_0} serve[:subcommand] [options...]\n\n");
            echo("Options:\n");
            echo("  \033[1;33m--help\033[0m\tShow this help and exit\n\n");
            echo("Available Subcommands:\n");
            echo($this->renderSubcommandsList());
            return;
        }

        system("php -S localhost:8080 -t ./public");
    }
}
