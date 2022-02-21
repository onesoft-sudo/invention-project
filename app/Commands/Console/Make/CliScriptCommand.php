<?php


namespace App\Commands\Console\Make;


use OSN\Framework\Console\Generator;
use OSN\Framework\Console\Migrations;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CliScriptCommand extends Command
{
    protected static $defaultName = "make:cli-script";
    protected static $defaultDescription = "Generate a new CLI script";

    protected function configure()
    {
        $this
            ->setHelp("Generate a new CLI script at {ROOT_DIR}")
            ->addArgument('name', InputArgument::REQUIRED, 'The CLI script name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $this->generator->generate(app()->config["root_dir"] . "/{$name}", 'cli-script.php', function () use ($output, $name) {
            @chmod(app()->config["root_dir"] . "/{$name}", 0755);
            $output->writeln("<info>CLI script created</info>: $name");
        }, function ($e) use ($name, $output) {
            $output->writeln("<error>Cannot generate CLI script</error>: $name.php: <comment>$e</comment>");
            exit(-1);
        }, $name);

        return 0;
    }
}
