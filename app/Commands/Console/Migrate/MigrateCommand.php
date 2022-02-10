<?php


namespace App\Commands\Console\Migrate;

use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateCommand extends Command
{
    protected static $defaultName = "migrate";
    protected static $defaultDescription = "Run the migrations";

    protected Migrations $migrations;

    public function __construct()
    {
        $this->migrations = new Migrations();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setHelp("Run all the migrations.");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->migrations->applyAll(function ($c) use ($output) {
            $output->writeln("<info>Applying migration:</info> <comment>$c</comment>");
        }, function ($c) use ($output) {
            $output->writeln("<info>Applied migration:</info> <comment>$c</comment>");
        }, function ($c) use ($output) {
            $output->writeln("<info>Migration is already up:</info> <comment>$c</comment>");
        });

        return 0;
    }
}
