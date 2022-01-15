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
                "Apply all non-applied migrations",
                [
                    '-f, --force' => 'Force to complete the operation without any prompt'
                ]
            ],
            'reset' => [
                "Rollback all applied migrations and reset the database",
                [
                    '-f, --force' => 'Force to complete the operation without any prompt'
                ]
            ],
            'rebuild' => [
                "Reset and re-migrate the whole database",
                [
                    '-s, --seed' => 'Run the seeders after finishing rebuild'
                ]
            ]
        ];
    }

    public function default(ArgumentCollection $args)
    {
        if (!parent::default($args))
            return;

        $this->migrations->applyAll();
    }

    private static function askUser(): bool
    {
        echo "\033[1;33m[!]\033[0m\033[1m This will erase everything in the database!\033[0m Please type `yes' to confirm:\n";
        $input = strtolower(trim(fgets(STDIN)));

        if ($input != 'y' && $input != 'yes') {
            echo "\033[1;33m[+]\033[0m Operation canceled by the user.";
            return false;
        }

        return true;
    }

    public function reset(ArgumentCollection $args)
    {
        if (!$args->hasOption('-f') && !$args->hasOption('--force') && !self::askUser()) {
            return ' ';
        }

        $this->migrations->reset();
        return '';
    }

    public function rebuild(ArgumentCollection $args)
    {
        if($this->reset($args) === ' '){
            return;
        }

        $this->migrations->applyAll();

        if ($args->hasOption('--seed') || $args->hasOption('-s')) {
            $this->runForeign(DBCommand::class, 'seed', $args);
        }
    }
}
