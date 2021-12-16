<?php


namespace App\Console;


use App\Core\App;

class AppConsole
{
    public Arguments $argument;
    public Generator $generator;
    public static string $root_dir;

    public function __construct()
    {
        $this->argument = new Arguments();
        $this->generator = new Generator();
        self::$root_dir = App::$app->config["root_dir"];
    }
}