<?php

use OSN\Framework\Core\App;

define('APP_START', microtime(true));

/**
 * @var App $app
 */
$app = require("../boot/app.php");
$app->run();

//echo microtime(true) - APP_START;
