<?php

use App\Core\App;
use OSN\Framework\Core\Collection;
use OSN\Framework\Facades\Auth;
use OSN\Framework\Facades\Database;

require "../vendor/autoload.php";

$app = new App("..");

$collection = collection([1, 2, 3, 4, 5, 6]);
