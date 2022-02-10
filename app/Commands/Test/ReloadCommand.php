<?php


namespace App\Commands\Test;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReloadCommand extends Command
{
    protected static $defaultName = 'system:reload';

    protected function configure(): void
    {
        $this
            ->setHelp("Reloads the whole system.");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Reloading...");
        sleep(3);
        $output->writeln("System reloaded.");
        return Command::SUCCESS;
    }
}
