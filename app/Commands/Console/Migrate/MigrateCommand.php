<?php


namespace App\Commands\Console\Migrate;

use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
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
        $this
            ->setHelp("Run all the migrations.")
            ->addOption(
                'seed',
                's',
                InputOption::VALUE_NONE,
                "Run the seeders after migration"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        global $argv;

        $this->migrations->applyAll(function ($c) use ($output) {
            $output->writeln("<info>Applying migration:</info> <comment>$c</comment>");
        }, function ($c) use ($output) {
            $output->writeln("<info>Applied migration:</info> <comment>$c</comment>");
        }, function ($c) use ($output) {
            $output->writeln("<info>Migration is already up:</info> <comment>$c</comment>");
        });

        if ($input->getOption('seed') !== false) {
            $output->writeln('');
            $this->getApplication()->find('db:seed')->run(new ArrayInput([]), $output);
        }

        return 0;
    }
}
