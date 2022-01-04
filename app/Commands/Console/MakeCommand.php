<?php


namespace App\Commands\Console;


use RuntimeException;
use OSN\Framework\Console\App;
use OSN\Framework\Console\ArgumentCollection;
use OSN\Framework\Console\Command;

class MakeCommand extends Command
{
    protected App $app;

    public function __construct()
    {
        $this->app = app();
        $this->requireOption('migration', '--table');
        $this->requireOption('factory', '--model');
        $this->requireArgumentMultiple([
            'migration',
            'controller',
            'request',
            'factory',
            'model',
        ], 1);
    }

    public function subcommandsDescription(): array
    {
        return [
            'migration' => [
                "Generate a migration class",
                [
                    "--table=[TABLE]" => "Specify the table name for the migration."
                ],
                "<migration_name>"
            ],
            'factory' => [
                "Generate a factory class",
                [
                    "--model=[MODEL]" => "Specify the model for the factory."
                ],
                "<factory_name>"
            ],
            'model' => [
                "Generate a model class",
                [
                    "-m" => "Create a new migration for the model (The model name will be considered as singular and the table name will be lowercase)",
                    "-f" => "Create a new factory class for the model"
                ],
                "<model_name>"
            ],
            'controller' => [
                "Generate an HTTP controller class",
                [
                    "--model=[MODEL]" => "Specify the model name for the controller.",
                    "--api" => "Generate an API controller.",
                    "--requests" => "Generate request classes for the controller.",
                ],
                "<controller_name>"
            ],
            'request' => [
                "Generate an HTTP request class",
                null,
                "<request_name>"
            ],
            'middleware' => [
                "Generate an HTTP middleware class",
                null,
                "<middleware_name>"
            ],
            'injector' => [
                "Generate an injector class",
                null,
                "<injector_name>"
            ],
            'command' => [
                "Generate a command class",
                null,
                "<command_name>"
            ],
            'cliScript' => [
                "Generate a new PHP CLI script",
                null,
                "<script_name>"
            ],
            'exception' => [
                "Generate an exception class",
                null,
                "<exception_name>"
            ]
        ];
    }

    public function default(ArgumentCollection $args)
    {
        if ($args->hasOption('--help')) {
            echo("Usage: php {$args->_0} make:<subcommand> [options...]\n\n");
            echo("Options:\n");
            echo("  \033[1;33m--help\033[0m\tShow this help and exit\n\n");
            echo("Available Subcommands:\n");
            echo($this->renderSubcommandsList());
            return;
        }

        echo('This command must be invoked with a subcommand or option.');
        exit(1);
    }

    public function migration(ArgumentCollection $args)
    {
        $table = $args->getOptionValue('--table');
        $name = "m" . date("Y_m_d_His_") . $args->getArgNoOption(2);
        $this->app->generator->generate($this->app->config["root_dir"] . "/database/migrations/{$name}.php", 'migration.php', $name, $table, $table);
        return "Migration created: $name";
    }

    public function request(ArgumentCollection $args)
    {
        $name = $args->getArgNoOption(2);
        $this->app->generator->generate($this->app->config["root_dir"] . "/app/Http/Requests/{$name}.php", 'request.php', $name);
        return "Request created: $name";
    }

    public function exception(ArgumentCollection $args)
    {
        $name = $args->getArgNoOption(2);
        $this->app->generator->generate($this->app->config["root_dir"] . "/app/Exceptions/{$name}.php", 'exception.php', $name);
        return "Exception created: $name";
    }

    public function injector(ArgumentCollection $args)
    {
        $name = $args->getArgNoOption(2);
        $this->app->generator->generate($this->app->config["root_dir"] . "/app/Injectors/{$name}.php", 'injector.php', $name);
        return "Injector created: $name";
    }

    public function command(ArgumentCollection $args)
    {
        $name = $args->getArgNoOption(2);
        $this->app->generator->generate($this->app->config["root_dir"] . "/app/Commands/{$name}.php", 'command.php', $name);
        return "Command created: $name";
    }

    public function cliScript(ArgumentCollection $args)
    {
        $name = $args->getArgNoOption(2);
        $this->app->generator->generate($this->app->config["root_dir"] . "/{$name}.php", 'cli-script.php', $name);
        return "Script created: $name";
    }

    public function middleware(ArgumentCollection $args)
    {
        $name = $args->getArgNoOption(2);
        $this->app->generator->generate($this->app->config["root_dir"] . "/app/Http/Middlewares/{$name}.php", 'middleware.php', $name);
        return "Middleware created: $name";
    }

    public function factory(ArgumentCollection $args)
    {
        $name = $args->getArgNoOption(2);
        $model = $args->getOptionValue('--model');

        $this->app->generator->generate($this->app->config["root_dir"] . "/database/factories/{$name}.php", 'factory.php', $model, $name, $model);
        return "Factory created: $name";
    }

    public function model(ArgumentCollection $args)
    {
        $name = $args->getArgNoOption(2);
        $factory = $args->hasOption('-f');
        $migration = $args->hasOption('-m');

        if ($factory) {
            echo $this->run('factory', [$name . 'Factory', '--model=' . $name]) . "\n";
        }

        if ($migration) {
            echo $this->run('migration', ['create_' . strtolower($name) . 's_table', '--table=' . strtolower($name) . 's']) . "\n";
        }

        $this->app->generator->generate($this->app->config["root_dir"] . "/app/Models/{$name}.php", 'model.php', $name);
        return "Model created: $name";
    }

    public function controller(ArgumentCollection $args)
    {
        $api = $args->hasOption('--api');
        $model = $args->getOptionValue('--model');
        $requests = $args->hasOption('--requests');
        $name = $args->getArgNoOption(2);
        $use = '';
        $request = ["Request", "Request", "Request"];

        if ($requests && $model !== false) {
            echo $this->run('request', ["Store{$model}Request"]) . "\n";
            echo $this->run('request', ["Update{$model}Request"]) . "\n";
            $use = "use App\\Http\\Requests\\Store{$model}Request;\nuse App\\Http\\Requests\\Update{$model}Request;";
            $request[1] = "Store{$model}Request";
            $request[2] = "Update{$model}Request";
        }
        else if ($requests && $model === false) {
            throw new RuntimeException("The '--requests' option requires the '--model' option to be passed.", -1);
        }

        $this->app->generator->generate($this->app->config["root_dir"] . "/app/Http/Controllers/{$name}.php", $api ? 'controller-api.php' : 'controller.php', $use, $name, ...$request);
        return "Controller created: $name";
    }
}
