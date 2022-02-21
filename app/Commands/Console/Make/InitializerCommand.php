<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class InitializerCommand extends Command
{
    protected static $defaultName = "make:initializer";
    protected static $defaultDescription = "Generate a new initializer class";

    protected function configure()
    {
        $this
            ->setHelp("Generate a new initializer class at {ROOT_DIR}/app/Initializer/")
            ->addArgument('name', InputArgument::REQUIRED, 'The initializer class name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $this->generator->generate(app()->config["root_dir"] . "/app/Initializer/{$name}.php", 'initializer.php', function () use ($output, $name) {
            $output->writeln("<info>Initializer created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate initializer</error>: $name.php: <comment>$e</comment>");
            exit(-1);
        }, $name);

        return 0;
    }
}
