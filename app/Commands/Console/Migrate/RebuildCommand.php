<?php


namespace App\Commands\Console\Migrate;

use OSN\Invention\CLI\Utils\Migrations;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
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
        $this
            ->setHelp("Rebuild the whole database from scratch.")
            ->addOption(
                'seed',
                's',
                InputOption::VALUE_NONE,
                "Run the seeders after migration"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = $this->getApplication()->find('migrate:reset');

        $input1 = new ArrayInput([]);
        $command->run($input1, $output);

        $output->writeln('');

        $command = $this->getApplication()->find('migrate');

        $input2 = new ArrayInput($input->getOption('seed') !== false ? ['--seed' => ''] : []);
        $command->run($input2, $output);

        return 0;
    }
}
