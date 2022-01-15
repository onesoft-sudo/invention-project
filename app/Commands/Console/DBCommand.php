<?php


namespace App\Commands\Console;

use OSN\Framework\Console\ArgumentCollection;
use OSN\Framework\Console\Command;
use OSN\Framework\Database\Seeder;

class DBCommand extends Command
{
    public static array $seeded = [];

    public function __construct()
    {
        $this->subcommandRequired();
    }

    public function subcommandsDescription(): array
    {
        return [
            'seed' => [
                "Run the database seeders"
            ]
        ];
    }

    public function seed(ArgumentCollection $args)
    {
        $seeders = scandir(basepath('/database/seeders'));

        foreach ($seeders as $seeder) {
            if (!is_dir($seeder)) {
                $seederClass = "Database\\Seeders\\" . pathinfo($seeder, PATHINFO_FILENAME);
                self::seedOne($seederClass);
            }
        }
    }

    public static function seedOne(string $seederClass)
    {
        if (in_array($seederClass, self::$seeded))
            return;

        /** @var Seeder $seederObject */
        $seederObject = new $seederClass();
        echo("\033[1;33mSeeding: \033[0m" . $seederClass . "\n");
        $seederObject->seed();
        echo("\033[1;32mSeeded: \033[0m" . $seederClass . "\n");
        self::$seeded[] = $seederClass;
    }
}
