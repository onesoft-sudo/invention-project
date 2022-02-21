<?php


namespace App\Commands\Console\Clear;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CacheCommand extends Command
{
    protected static $defaultName = 'clear:cache';
    protected static $defaultDescription = 'Clear the app\'s cache';

    protected function configure()
    {
        $this
            ->setHelp("Erase all the caches created by the app and the framework")
            ->addOption(
                'app',
                'a',
                InputOption::VALUE_NONE,
                "Only clear the app's cache"
            )
            ->addOption(
                'framework',
                'f',
                InputOption::VALUE_NONE,
                "Only clear the framework's cache"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $f = $input->getOption('framework') !== false;
        $a = $input->getOption('app') !== false;

        if (!$f && !$a) {
            $f = $a = true;
        }

        if ($a) {
            $output->writeln("<comment>Erasing app cache...</comment>");
            app()->cache->removeAll();
            $output->writeln("<info>App cache erased!</info>");
        }

        if ($f) {
            $output->writeln("<comment>Erasing framework cache...</comment>");
            app()->cache->removeInternals();
            $output->writeln("<info>Framework cache erased!</info>");
        }

        return 0;
    }
}
