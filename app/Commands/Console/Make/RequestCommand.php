<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class RequestCommand extends Command
{
    protected static $defaultName = "make:request";
    protected static $defaultDescription = "Generate a new request class";

    protected function configure()
    {
        $this
            ->setHelp("Generate a new request class at {ROOT_DIR}/app/Http/Requests/")
            ->addArgument('name', InputArgument::REQUIRED, 'The request class name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $this->generator->generate(app()->config["root_dir"] . "/app/Http/Requests/{$name}.php", 'request.php', function () use ($output, $name) {
            $output->writeln("<info>Request created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate request</error>: $name.php: <comment>$e</comment>");
            exit(-1);
        }, $name);

        return 0;
    }
}
