<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ExceptionCommand extends Command
{
    protected static $defaultName = "make:exception";
    protected static $defaultDescription = "Generate a new exception class";

    protected function configure()
    {
        $this
            ->setHelp("Generate a new exception class at {ROOT_DIR}/app/Exceptions/")
            ->addArgument('name', InputArgument::REQUIRED, 'The exception class name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $this->generator->generate(app()->config["root_dir"] . "/app/Exceptions/{$name}.php", 'exception.php', function () use ($output, $name) {
            $output->writeln("<info>Exception created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate exception</error>: $name.php: <comment>$e</comment>");
            exit(-1);
        }, $name);

        return 0;
    }
}
