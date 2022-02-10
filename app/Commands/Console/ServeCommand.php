<?php


namespace App\Commands\Console;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServeCommand extends Command
{
    protected static $defaultName = "serve";
    protected static $defaultDescription = "Starts PHP's built-in local development server";

    protected function configure()
    {
        $this->setHelp("Starts PHP's built-in local development server.");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return system("php -S localhost:" . env('SERVER_PORT') . " -t ./public");
    }
}
