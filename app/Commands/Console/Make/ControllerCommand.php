<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ControllerCommand extends Command
{
    protected static $defaultName = "make:controller";
    protected static $defaultDescription = "Generate a new controller class";

    protected Generator $generator;

    public function __construct()
    {
        $this->generator = new Generator();
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setHelp("Generate a new controller class at {ROOT_DIR}/app/Http/Controllers")
            ->addArgument('name', InputArgument::REQUIRED, 'The controller class name')
            ->addOption(
                'api',
                null,
                InputOption::VALUE_NONE,
                'Specifies that it should generate an API controller'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $api = $input->getOption('api') !== false;
        $name = $input->getArgument('name');

        $this->generator->generate(app()->config["root_dir"] . "/app/Http/Controllers/{$name}.php", $api ? 'controller-api.php' : 'controller.php', function () use ($output, $name) {
            $output->writeln("<info>Controller created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate controller</error>: $name.php: <comment>$e</comment>");
        }, $name);

        return 0;
    }
}
