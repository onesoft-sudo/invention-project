<?php

require "../vendor/autoload.php";

use OSN\Framework\Core\App;

$app = new App("..");

include "../routes/web.php";

$app->run();

