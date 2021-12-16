<?php

require "../vendor/autoload.php";

use App\Core\App;

$app = new App("..");

include "../routes/web.php";

$app->run();