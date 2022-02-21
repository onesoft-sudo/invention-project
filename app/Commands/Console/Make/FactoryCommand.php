<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class FactoryCommand extends Command
{
    protected static $defaultName = "make:factory";
    protected static $defaultDescription = "Generate a new factory class";

    protected function configure()
    {
        $this
            ->setHelp("Generate a new factory class at {ROOT_DIR}/database/factories/")
            ->addArgument('name', InputArgument::REQUIRED, 'The factory class name')
            ->addOption(
                'model',
                'm',
                InputOption::VALUE_REQUIRED,
                'Specify the model for the factory'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $model = $input->getOption('model');

        if (!$model) {
            $model = preg_replace('/Factory$/', '', $name);
        }

        $this->generator->generate(app()->config["root_dir"] . "/database/factories/{$name}.php", 'factory.php', function () use ($output, $name) {
            $output->writeln("<info>Factory created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate factory</error>: $name.php: <comment>$e</comment>");
            exit(-1);
        }, $model, $name, $model);

        return 0;
    }
}
