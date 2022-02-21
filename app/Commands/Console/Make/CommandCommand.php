<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class CommandCommand extends Command
{
    protected static $defaultName = "make:command";
    protected static $defaultDescription = "Generate a new command class";

    protected function configure()
    {
        $this
            ->setHelp("Generate a new command class at {ROOT_DIR}/app/Commands/")
            ->addArgument('name', InputArgument::REQUIRED, 'The command class name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $this->generator->generate(app()->config["root_dir"] . "/app/Commands/{$name}.php", 'command.php', function () use ($output, $name) {
            $output->writeln("<info>Command created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate command</error>: $name.php: <comment>$e</comment>");
            exit(-1);
        }, $name);

        return 0;
    }
}
