<?php

use App\Core\App;
use OSN\Framework\Core\Collection;
use OSN\Framework\Facades\Auth;
use OSN\Framework\Facades\Database;

require "../vendor/autoload.php";

$app = new App("..");

$collection = collection([
    "test2",
    "divide",
    "sumf0",
    485075.34346
]);

dp($collection->search('/0/'));