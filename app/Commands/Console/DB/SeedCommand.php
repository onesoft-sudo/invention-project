<?php


namespace App\Commands\Console\DB;


use OSN\Framework\Database\Seeder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SeedCommand extends Command
{
    protected static $defaultName = "db:seed";
    protected static $defaultDescription = "Run the seeders";
    public array $seeded = [];

    protected function configure()
    {
        $this
            ->setHelp("Run the database seeders");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $seeders = scandir(basepath('/database/seeders'));

        foreach ($seeders as $seeder) {
            if (!is_dir($seeder)) {
                $seederClass = "Database\\Seeders\\" . pathinfo($seeder, PATHINFO_FILENAME);
                $this->seedOne($seederClass, $output);
            }
        }

        return 0;
    }

    protected function seedOne(string $seederClass, OutputInterface $output)
    {
        if (in_array($seederClass, $this->seeded))
            return;

        /** @var Seeder $seederObject */
        $seederObject = new $seederClass();
        $output->writeln("\033[1;33mSeeding: \033[0m" . $seederClass);
        $seederObject->seed();
        $output->writeln("\033[1;32mSeeded: \033[0m" . $seederClass);
        $this->seeded[] = $seederClass;
    }
}
