<?php

require __DIR__ . "/vendor/autoload.php";

use App\Console\AppConsole;
use App\Console\Migrations;
use App\Core\App;

if (count($argv) < 2) {
   echo "No argument given! Try `php {$argv[0]} --help' for more information.";
   exit(1);
}

$app = new App(".");
$appConsole = new AppConsole();

switch ($argv[1]) {
    case "migrate":
        $m = new Migrations();
        $m->applyAll();
        break;

    case "migrate:rollback":
        $m = new Migrations();
        $m->rollbackAll();
        break;

    case "gen:migration":
        $appConsole->argument->requireArgument(1);
        $name = $argv[2];
        $fullname = "m" . date("Y_m_d_His_") . $name;
        $appConsole->generator->generate($app->config["root_dir"] . "/database/migrations/$fullname.php", "migration.php", "migration", $fullname);
        echo "Migration generated: $fullname\n";
        break;

    case "gen:controller":
        $appConsole->argument->requireArgument(1);
        $name = $argv[2];
        $path = "/app/Http/Controllers/$name.php";
        $appConsole->generator->generate($app->config["root_dir"] . $path, "controller.php", "controller", $name);
        echo "Controller Created: $name [.$path]\n";
        break;

    case "gen:middleware":
        $appConsole->argument->requireArgument(1);
        $name = $argv[2];
        $path = "/app/Http/Middlewares/$name.php";
        $appConsole->generator->generate($app->config["root_dir"] . $path, "middleware.php", "middleware", $name);
        echo "Middleware Created: $name [.$path]\n";
        break;

    case "gen:view":
        $appConsole->argument->requireArgument(1);
        $name = $argv[2];
        $path = "/resources/views/$name.php";
        $appConsole->generator->generate($app->config["root_dir"] . $path, "view.php", "view", $name);
        echo "View Created: $name [.$path]\n";
        break;

    case "gen:model":
        $appConsole->argument->requireArgument(1);
        $name = $argv[2];
        $path = "/app/Models/$name.php";
        $appConsole->generator->generate($app->config["root_dir"] . $path, "model.php", "model", $name);
        echo "Model Created: $name [.$path]\n";
        break;

    default:
        echo "The command `{$argv[1]}' is not recognized. Try `php {$argv[0]} --help' for more information.";
        exit(2);
}