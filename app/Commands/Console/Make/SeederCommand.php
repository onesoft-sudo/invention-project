<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class SeederCommand extends Command
{
    protected static $defaultName = "make:seeder";
    protected static $defaultDescription = "Generate a new seeder class";

    protected function configure()
    {
        $this
            ->setHelp("Generate a new seeder class at {ROOT_DIR}/database/seeders/")
            ->addArgument('name', InputArgument::REQUIRED, 'The seeder class name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $this->generator->generate(app()->config["root_dir"] . "/database/seeders/{$name}.php", 'seeder.php', function () use ($output, $name) {
            $output->writeln("<info>Seeder created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate seeder</error>: $name.php: <comment>$e</comment>");
            exit(-1);
        }, $name);

        return 0;
    }
}
