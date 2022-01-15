<?php


namespace App\Commands\Console;


use OSN\Framework\Console\ArgumentCollection;
use OSN\Framework\Console\Command;

class DefaultCommand extends Command
{
    public function default(ArgumentCollection $args)
    {
        println("The command `{$args[1]}' was not found. Try `php {$args[0]} --help' for more information.");
        exit(1);
    }
}
