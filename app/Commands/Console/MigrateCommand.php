<?php


namespace App\Commands\Console;

use OSN\Framework\Console\ArgumentCollection;
use OSN\Framework\Console\Command;
use OSN\Framework\Console\Migrations;

class MigrateCommand extends Command
{
    protected Migrations $migrations;

    public function __construct()
    {
        $this->migrations = new Migrations();
    }

    public function subcommandsDescription(): array
    {
        return [
            'default' => [
                "Apply all non-applied migrations"
            ],
            'rollback' => [
                "Rollback all applied migrations"
            ]
        ];
    }

    public function default(ArgumentCollection $args)
    {
        if ($args->hasOption('--help')) {
            echo("Usage: php {$args->_0} migrate[:subcommand] [options...]\n\n");
            echo("Options:\n");
            echo("  \033[1;33m--help\033[0m\tShow this help and exit\n\n");
            echo("Available Subcommands:\n");
            echo($this->renderSubcommandsList());
            return;
        }

        $this->migrations->applyAll();
    }

    public function rollback(ArgumentCollection $args)
    {
        $this->migrations->rollbackAll();
    }
}
