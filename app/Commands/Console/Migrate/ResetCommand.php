<?php


namespace App\Commands\Console\Migrate;

use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ResetCommand extends Command
{
    protected static $defaultName = "migrate:reset";
    protected static $defaultDescription = "Down all the migrations";

    protected Migrations $migrations;

    public function __construct()
    {
        $this->migrations = new Migrations();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setHelp("Reset the database to default by downing the migrations.");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->migrations->reset(function ($c) use ($output) {
            $output->writeln("<info>Rolling back migration:</info> <comment>$c</comment>");
        }, function ($c) use ($output) {
            $output->writeln("<info>Rolled back migration:</info> <comment>$c</comment>");
        }, function ($c) use ($output) {
            $output->writeln("<info>Migration is already down:</info> <comment>$c</comment>");
        });

        return 0;
    }
}
