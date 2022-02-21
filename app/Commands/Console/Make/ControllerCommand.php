<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ControllerCommand extends Command
{
    protected static $defaultName = "make:controller";
    protected static $defaultDescription = "Generate a new controller class";

    protected function configure()
    {
        $this
            ->setHelp("Generate a new controller class at {ROOT_DIR}/app/Http/Controllers")
            ->addArgument('name', InputArgument::REQUIRED, 'The controller class name')
            ->addOption(
                'api',
                'a',
                InputOption::VALUE_NONE,
                'Specifies that it should generate an API controller'
            )
            ->addOption(
                'resource',
                'r',
                InputOption::VALUE_NONE,
                'Specifies that it should generate a resource controller'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $api = $input->getOption('api') !== false;
        $resource = $input->getOption('resource') !== false;
        $name = $input->getArgument('name');

        if ($api && $resource) {
            $output->writeln("<error>Passing conflicting options --api/-a and --resource/-r together</error>");
            exit(-1);
        }

        $template = 'controller.php';

        if ($api) {
            $template = 'controller-api.php';
        }

        if ($resource) {
            $template = 'controller-resource.php';
        }

        $this->generator->generate(app()->config["root_dir"] . "/app/Http/Controllers/{$name}.php", $template, function () use ($output, $name) {
            $output->writeln("<info>Controller created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate controller</error>: $name.php: <comment>$e</comment>");
            exit(-1);
        }, $name);

        return 0;
    }
}
