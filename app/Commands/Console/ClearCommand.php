<?php


namespace App\Commands\Console;

use OSN\Framework\Console\ArgumentCollection;
use OSN\Framework\Console\Command;

class ClearCommand extends Command
{
    public function __construct()
    {
        $this->subcommandRequired();
    }

    public function subcommandsDescription(): array
    {
        return [
            'cache' => [
                "Clear the whole app's cache. This might make the app slower when it runs the first time after this operation. Note that the caches will be re-generated automatically."
            ]
        ];
    }

    public function cache(ArgumentCollection $args)
    {
        rrmdir_contents(cache_dir());
        return 'Cache cleared.';
    }
}
