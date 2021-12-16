<?php


namespace App\Console;


class Arguments
{
    public function hasArgument($arg): bool
    {
        global $argv;
        return in_array($arg, $argv);
    }

    public function requireArgument(int $count)
    {
        global $argv;

        if (count($argv) < $count + 2) {
            if (!isset($argv[2])){
                echo "This command requires an argument!\n";
                exit(1);
            }
        }
    }
}