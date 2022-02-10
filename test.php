<?php

use App\Commands\Test\ReloadCommand;

require "vendor/autoload.php";

$app = new \OSN\Framework\Console\App('.');
$app->add(new ReloadCommand());
$app->run();
