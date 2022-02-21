<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MiddlewareCommand extends Command
{
    protected static $defaultName = "make:middleware";
    protected static $defaultDescription = "Generate a new middleware class";

    protected function configure()
    {
        $this
            ->setHelp("Generate a new middleware class at {ROOT_DIR}/app/Http/Middleware/")
            ->addArgument('name', InputArgument::REQUIRED, 'The middleware class name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $this->generator->generate(app()->config["root_dir"] . "/app/Http/Middleware/{$name}.php", 'middleware.php', function () use ($output, $name) {
            $output->writeln("<info>Middleware created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate middleware</error>: $name.php: <comment>$e</comment>");
            exit(-1);
        }, $name);

        return 0;
    }
}
