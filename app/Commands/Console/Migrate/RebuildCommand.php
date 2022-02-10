<?php


namespace App\Commands\Console\Migrate;

use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RebuildCommand extends Command
{
    protected static $defaultName = "migrate:rebuild";
    protected static $defaultDescription = "Rebuild the whole database from scratch";

    protected Migrations $migrations;

    public function __construct()
    {
        $this->migrations = new Migrations();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setHelp("Rebuild the whole database from scratch.");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = $this->getApplication()->find('migrate:reset');

        $input = new ArrayInput([]);
        $command->run($input, $output);

        $output->writeln('');

        $command = $this->getApplication()->find('migrate');

        $input = new ArrayInput([]);
        $command->run($input, $output);

        return 0;
    }
}
